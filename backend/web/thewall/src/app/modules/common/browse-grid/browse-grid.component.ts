import { Component, OnInit, ViewChild, AfterViewInit, OnDestroy } from '@angular/core';
import { ActivatedRoute, Router, Params } from '@angular/router';

import { MatPaginator, MatSort, Sort, PageEvent } from '@angular/material';

import { SelectionModel } from '@angular/cdk/collections';

import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { ApiService } from '../../../common/services/api.service';
import { of as observableOf, Subject, Subscription, combineLatest } from 'rxjs';
import { switchMap, catchError, debounceTime } from 'rxjs/operators';
import { YIIEntityResponse } from '../../../common/models/yii/yii-entity-response.model';
import { GridBuilderService } from '../../../common/services/grid-builder.service';

import { Column, ColumnProps } from '../../../common/models/columns/columns.model';

import { FilterRowDirective } from '../filter-row/filter-row.directive';
import { ActiveModulesService } from 'src/app/layout/active-modules/active-modules.service';
import { ModuleConfig } from 'src/app/layout/menu/module-config.model';

@Component({
  selector: 'sch-browse-grid',
  templateUrl: './browse-grid.component.html',
  styleUrls: ['./browse-grid.component.css']
})
export class BrowseGridComponent implements OnInit, OnDestroy {
  private initialized: boolean;
  private subscriptions: Subscription;
  private routeData: ModuleConfig;

  idProperty;

  selection = new SelectionModel<any>(true, []);

  columnsCfg: ColumnProps[] = [];
  displayedColumns: string[] = [];
  displayedFilterColumns: string[] = [];

  dataSource;
  totalCount: number;

  @ViewChild(FilterRowDirective)
  filterRow: FilterRowDirective;

  filtersChanged = new Subject();

  pageSizeOptions = [10, 20, 50, 100];
  pageSize = this.pageSizeOptions[0];

  @ViewChild(MatPaginator)
  paginator: MatPaginator;

  @ViewChild(MatSort)
  sort: MatSort;

  defaultSortDir: 'asc' | 'desc' = 'asc';

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private crud: YiiCrudService,
    private api: ApiService,
    private gridBuilder: GridBuilderService,
    private activeModules: ActiveModulesService
  ) {}

  ngOnInit() {
    this.routeData = this.route.snapshot.data as ModuleConfig;
    this.activeModules.add(this.routeData);

    // Updates URL to match grid state
    this.subscriptions = combineLatest(
      this.route.queryParams,
      this.sort.sortChange,
      this.paginator.page,
      this.filterRow.filtersChanged
    )
      .pipe(debounceTime(100))
      .subscribe(([queryParams, sorting, pager, filters]: [Params, Sort, PageEvent, Params]) => {
        const sortDir = sorting.direction === 'desc' ? '-' : '';

        const mergedQueryParams = Object.assign({}, queryParams, {
          page: this.paginator.pageIndex + 1,
          'per-page': this.paginator.pageSize,
          sort: sortDir + sorting.active,
          filters
        });

        this.router.navigate([], {
          queryParams: mergedQueryParams,
          relativeTo: this.route,
          replaceUrl: true
        });
      });

    const gridParamsSubscription = combineLatest(
      this.sort.sortChange,
      this.paginator.page,
      this.filterRow.filtersChanged
    )
      .pipe(
        switchMap(([sort, pager, filters]: [Sort, PageEvent, string]) => this.crud.list(sort, pager, filters)),
        catchError((...params) => {
          // TODO: propert error handling
          console.log('Error on data retrieving => ', params);
          return observableOf([]);
        })
      )
      .subscribe((result: YIIEntityResponse) => {
        if (!this.initialized) {
          this.initialized = true;

          this.columnsCfg = this.gridBuilder.generateColumnsData(result);

          this.displayedColumns = this.columnsCfg.map((item: Column) => item.name);
          this.displayedColumns.unshift('selection');
          this.displayedColumns.push('actions');
        }

        this.displayedFilterColumns = this.displayedColumns.map(item => 'filter_' + item);

        this.dataSource = result.result.list;

        this.totalCount = result.result.total;
      });

    this.subscriptions.add(gridParamsSubscription);

    this.setInitialValues();
  }

  setInitialValues() {
    const initialRouteParams = this.route.snapshot.params;

    const { category, module } = initialRouteParams,
      api = this.api.getModuleApi(category, module),
      idProperty = this.api.getModuleIdProperty(category, module);

    this.crud.setApi(api);
    this.crud.setIdProperty(idProperty);

    this.idProperty = idProperty;

    const { queryParams } = this.route.snapshot;

    let sortDir = this.defaultSortDir,
      sort = idProperty;

    if (queryParams.sort) {
      if (queryParams.sort.charAt(0) === '-') {
        sort = queryParams.sort.substr(1);
        sortDir = 'desc';
      } else {
        sort = queryParams.sort;
        sortDir = 'asc';
      }
    }

    this.sort.sort({
      id: sort,
      start: sortDir,
      disableClear: false
    });
    // this.sort.sortChange.next({
    //   active: sort,
    //   direction: sortDir
    // });

    if (queryParams['per-page']) {
      this.pageSize = queryParams['per-page'];
    }

    this.paginator.pageIndex = queryParams.page ? queryParams.page - 1 : 0;

    this.paginator.page.next({
      length: 0,
      pageIndex: this.paginator.pageIndex,
      pageSize: +this.pageSize
    });

    // TODO: proper initial values
    this.filterRow.filtersChanged.next(queryParams.filters);
  }

  ngOnDestroy() {
    // clean up subscriptions
    const routeSnapshot = this.route.snapshot.data as ModuleConfig;

    // TODO: test removal
    console.log('routeSnapshot => ', routeSnapshot);
    this.activeModules.remove(routeSnapshot);

    this.subscriptions.unsubscribe();
  }

  ngAfterViewInit() {}

  isAllSelected() {
    const numSelected = this.selection.selected.length;
    const numRows = this.dataSource.length;
    return numSelected === numRows;
  }

  masterToggle() {
    this.isAllSelected()
      ? this.selection.clear()
      : this.dataSource.forEach(row => {
          this.selection.select(row);
        });
  }

  onAdd() {
    this.router.navigate(['detail'], {
      relativeTo: this.route
    });
  }

  onEdit() {
    this.router.navigate(['detail', this.selection.selected[0][this.idProperty]], {
      relativeTo: this.route
    });
  }

  onRemove() {
    this.crud.delete(this.selection.selected[0][this.idProperty]).subscribe();
  }
}
