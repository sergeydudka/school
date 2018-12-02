import { Component, OnInit, ViewChild, AfterViewInit, OnDestroy, ElementRef } from '@angular/core';
import { ActivatedRoute, Router, Params } from '@angular/router';

import { MatPaginator, MatSort, Sort, PageEvent, MatCheckboxChange } from '@angular/material';

import { SelectionModel } from '@angular/cdk/collections';

import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { ApiService } from '../../../common/services/api.service';
import { of as observableOf, Subject, Subscription, combineLatest } from 'rxjs';
import { switchMap, catchError, debounceTime, tap } from 'rxjs/operators';
import { YIIEntityResponse } from '../../../common/models/yii/yii-entity-response.model';
import { GridBuilderService } from '../../../common/services/grid-builder.service';

import { Column, ColumnProps } from '../../../common/models/columns/columns.model';

import { FilterRowDirective } from '../filter-row/filter-row.directive';
import { ActiveModulesService } from 'src/app/layout/active-modules/active-modules.service';
import { ModuleConfig } from 'src/app/layout/menu/module-config.model';

import { OverlayService } from 'src/app/modules/overlay-module/overlay.service';
import { FormService } from 'src/app/common/services/form.service';

@Component({
  selector: 'sch-dynamic-grid',
  templateUrl: './dynamic-grid.component.html',
  styleUrls: ['./dynamic-grid.component.scss'],
  // each instance should have it's own crud service
  providers: [YiiCrudService]
})
export class DynamicGridComponent implements OnInit, AfterViewInit, OnDestroy {
  private initialized: boolean;
  private subscriptions: Subscription;
  private routeData: ModuleConfig;

  private autoRefreshIntervalRef: number;
  private refreshTrigger: Subject<void>;
  // TODO: take value from config
  private autoRefreshInterval = 30000;
  idProperty;

  private _hoveredColumn: Column = null;

  selection = new SelectionModel<any>(true, []);

  columnsCfg: ColumnProps[] = [];
  displayedColumns: string[] = [];
  displayedFilterColumns: string[] = [];

  dataSource;
  totalCount: number;

  @ViewChild(FilterRowDirective)
  filterRow: FilterRowDirective;

  filtersChanged = new Subject();

  // TODO: take those from config
  pageSizeOptions = [10, 20, 50, 100];
  pageSize = this.pageSizeOptions[0];

  @ViewChild(MatPaginator)
  paginator: MatPaginator;

  @ViewChild(MatSort)
  sort: MatSort;

  defaultSort: string;
  defaultSortDir: 'asc' | 'desc' = 'asc';

  constructor(
    private elRef: ElementRef,
    private route: ActivatedRoute,
    private router: Router,
    private crud: YiiCrudService,
    private api: ApiService,
    private gridBuilder: GridBuilderService,
    private formService: FormService,
    private activeModules: ActiveModulesService,
    private overlayService: OverlayService
  ) {}

  ngOnInit() {
    this.routeData = this.route.snapshot.data as ModuleConfig;
    this.activeModules.add(this.routeData);

    this.refreshTrigger = new Subject();

    // Updates URL to match grid state
    this.subscriptions = combineLatest(
      this.route.queryParams,
      this.sort.sortChange,
      this.paginator.page,
      this.filterRow.filtersChanged
    )
      .pipe(debounceTime(100))
      .subscribe(([queryParams, sorting, pager, filters]: [Params, Sort, PageEvent, string]) => {
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
      this.filterRow.filtersChanged,
      this.refreshTrigger
    )
      .pipe(
        tap(_ => {
          // TODO: remove timeout hack
          setTimeout(() => {
            this.overlayService.show({
              target: this.elRef
            });
          }, 1);
        }),
        switchMap(([sort, pager, filters]: [Sort, PageEvent, string, void]) => this.crud.list(sort, pager, filters)),
        catchError((...params) => {
          // TODO: proper error handling
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

        // TODO: remove timeout hack
        setTimeout(() => {
          this.overlayService.hide({
            target: this.elRef
          });
        }, 1);

        this.displayedFilterColumns = this.displayedColumns.map(item => 'filter_' + item);

        this.dataSource = result.result.list;

        this.totalCount = result.result.total;
      });

    this.subscriptions.add(gridParamsSubscription);

    this.filterRow.filterInvalid.subscribe(() => {
      this.formService.showErrors(this.filterRow.filterForm);
    });

    this.setInitialValues();
  }

  setInitialValues() {
    const { category, module } = this.route.snapshot.data,
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
    this.filterRow.setInitialState(queryParams.filters);

    this.refreshTrigger.next();
  }

  ngOnDestroy() {
    // clean up subscriptions
    const routeSnapshot = this.route.snapshot.data as ModuleConfig;

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

  forceGridRefresh() {
    this.refreshTrigger.next();
  }

  onAutoRefreshChanged(value: MatCheckboxChange) {
    if (value.checked) {
      this.autoRefreshIntervalRef = window.setInterval(() => {
        this.forceGridRefresh();
      }, this.autoRefreshInterval);
    } else {
      window.clearInterval(this.autoRefreshIntervalRef);
    }
  }

  private isColumnActive(column: Column) {
    return this.displayedColumns.includes(column.name);
  }

  private isFilterColumnActive(column: Column) {
    return this.displayedFilterColumns.includes(`filter_${column.name}`);
  }

  private handleColumnVisibilityChange(column: Column, checked: boolean) {
    if (!checked) {
      this.displayedColumns = this.displayedColumns.filter(name => name !== column.name);
      this.displayedFilterColumns = this.displayedFilterColumns.filter(name => name !== `filter_${column.name}`);
    } else {
      this.displayedColumns = [...this.displayedColumns, column.name];
      this.displayedFilterColumns = [...this.displayedFilterColumns, `filter_${column.name}`];
    }
  }

  isSingleColumn() {
    // column + checkbox + actions
    return this.displayedColumns.length === 3;
  }

  onRemove() {
    this.handleRemove(this.selection.selected[0]);
  }

  onRemoveSinge(element) {
    this.handleRemove(element);
  }

  private handleRemove(element): void {
    this.overlayService.show({
      target: this.elRef
    });
    this.crud.delete(element[this.idProperty]).subscribe(result => {
      this.overlayService.hide({
        target: this.elRef
      });
    });
  }

  private handleHoveredColumnHeaderChanged(column: Column) {
    this._hoveredColumn = column;
  }

  changeSort(sortDir: 'asc' | 'desc') {
    // skip if already active
    if (this._hoveredColumn.name === this.sort.active && sortDir === this.sort.direction) return;

    this.sort.sort({
      id: this._hoveredColumn.name,
      start: sortDir,
      disableClear: true
    });
  }
}
