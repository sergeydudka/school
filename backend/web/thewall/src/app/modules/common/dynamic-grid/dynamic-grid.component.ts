import {
  Component,
  OnInit,
  ViewChild,
  OnDestroy,
  ElementRef
} from '@angular/core';
import { ActivatedRoute, Router, Params } from '@angular/router';

import {
  MatPaginator,
  MatSort,
  Sort,
  PageEvent,
  MatCheckboxChange
} from '@angular/material';

import { SelectionModel } from '@angular/cdk/collections';

import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { ApiService } from '../../../common/services/api.service';
import { of as observableOf, Subject, Subscription, combineLatest } from 'rxjs';
import { switchMap, catchError, debounceTime, tap } from 'rxjs/operators';
import { YIIEntityResponse } from '../../../common/models/yii/yii-entity-response.model';
import { GridBuilderService } from '../../../common/services/grid-builder.service';

import {
  Column,
  ColumnProps
} from '../../../common/models/columns/columns.model';

import { FilterRowDirective } from '../filter-row/filter-row.directive';
import { ActiveModulesService } from 'src/app/layout/active-modules/active-modules.service';
import { ModuleConfig } from 'src/app/layout/menu/module-config.model';

import { OverlayService } from 'src/app/modules/overlay-module/overlay.service';
import { FormService } from 'src/app/common/services/form.service';

import { MakeStateful, Stateful, RestoreState } from 'src/app/stateful';

type ColumnsMap = Map<string, ColumnProps>;

@Component({
  selector: 'sch-dynamic-grid',
  templateUrl: './dynamic-grid.component.html',
  styleUrls: ['./dynamic-grid.component.scss'],
  // each instance should have it's own crud service
  providers: [YiiCrudService]
})
@MakeStateful({
  // debug: true,
  asyncInitialState: true,
  stateProperties: [
    {
      prop: 'columnsCfg',
      keys: ['hidden'],
      primaryKey: 'name'
    }
  ],
  stateTriggers: ['columnsConfigChanged']
})
export class DynamicGridComponent implements OnInit, OnDestroy, Stateful {
  private initialized: boolean;
  private subscriptions: Subscription[];
  private routeData: ModuleConfig;

  private autoRefreshIntervalRef: number;
  private refreshTrigger: Subject<void>;

  // TODO: take value from config
  private autoRefreshInterval = 30000;
  idProperty;

  stateChanged$: Subject<void> = new Subject();

  private _hoveredColumn: Column = null;

  selection = new SelectionModel<any>(true, []);

  columnsCfg: ColumnProps[] = [];
  columnsCfgMap: ColumnsMap = new Map();
  columnsConfigChanged: Subject<ColumnProps[]> = new Subject();

  displayedColumns: string[] = [];
  displayedFilterColumns: string[] = [];

  /**
   * List for columns to add at the begging
   */
  columnsStart: string[] = ['selection'];
  /**
   * List for columns to add at the end
   */
  columnsEnd: string[] = ['actions'];
  /**
   * List of columns that should be always visible
   */
  persistantColumns: string[] = [...this.columnsStart, ...this.columnsEnd];
  /**
   * Number of columns that can be hidden
   * Required to prevent
   */
  private hideableColumnsCount: number;

  dataSource;
  totalCount: number;

  @ViewChild(FilterRowDirective)
  filterRow: FilterRowDirective;

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

    this.setupSubscriptions();
    this.setInitialValues();
  }

  ngOnDestroy() {
    // clean up subscriptions
    const routeSnapshot = this.route.snapshot.data as ModuleConfig;

    this.activeModules.remove(routeSnapshot);

    this.subscriptions.forEach(subscription => subscription.unsubscribe());
  }

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
    this.router.navigate(
      ['detail', this.selection.selected[0][this.idProperty]],
      {
        relativeTo: this.route
      }
    );
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

  allowColumnHide(column: Column) {
    return (
      (this.hideableColumnsCount === 1 && !column.hidden) ||
      this.persistantColumns.includes(column.name)
    );
  }

  handleRemove() {
    this._handleRemove(this.selection.selected[0]);
  }

  handleRemoveSinge(element) {
    this._handleRemove(element);
  }

  changeSort(sortDir: 'asc' | 'desc') {
    // skip if already active
    if (
      this._hoveredColumn.name === this.sort.active &&
      sortDir === this.sort.direction
    ) {
      return;
    }

    this.sort.sort({
      id: this._hoveredColumn.name,
      start: sortDir,
      disableClear: true
    });
  }

  private setupSubscriptions() {
    this.subscriptions = [
      this.setupUrlSync(),
      this.handleColumnsChanged(),
      this.handleDataLoad()
    ];

    const filtersInavlidSubscription = this.filterRow.filterInvalid.subscribe(
      () => {
        this.formService.showErrors(this.filterRow.filterForm);
      }
    );

    this.subscriptions.push(filtersInavlidSubscription);
  }

  private handleDataLoad(): Subscription {
    return combineLatest(
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
        switchMap(([sort, pager, filters]: [Sort, PageEvent, string, void]) =>
          this.crud.list(sort, pager, filters)
        ),
        catchError((...params) => {
          // TODO: proper error handling
          console.log('Error on data retrieving => ', params);
          return observableOf([]);
        })
      )
      .subscribe((result: YIIEntityResponse) => {
        // we are only interested on intial columns config
        // no need to rerender columns each time
        if (!this.initialized) {
          const columnsCfg = this.gridBuilder.generateColumnsData(result);

          this.setColumnsCfg(columnsCfg);

          // required by Stateful decorator, to signalize that component
          // is ready for state restoration
          this.stateChanged$.next();

          // we need to call one more time once state is restored
          this.setColumnsCfg(this.columnsCfg);

          this.initialized = true;
        }

        // TODO: remove timeout hack
        setTimeout(() => {
          this.overlayService.hide({
            target: this.elRef
          });
        }, 1);

        this.dataSource = result.result.list;
        this.totalCount = result.result.total;
      });
  }

  private setColumnsCfg(cfg: ColumnProps[] | ColumnsMap) {
    if (Array.isArray(cfg)) {
      this.columnsCfg = cfg;
      this.columnsCfgMap.clear();
      cfg.forEach(item => this.columnsCfgMap.set(item.name, item));
    } else {
      this.columnsCfgMap = cfg;
      this.columnsCfg.length = 0;
      for (const val of this.columnsCfgMap.values()) {
        this.columnsCfg.push(val);
      }
    }

    this.columnsConfigChanged.next();
  }

  private setupUrlSync(): Subscription {
    // Updates URL to match grid state
    return combineLatest(
      this.route.queryParams,
      this.sort.sortChange,
      this.paginator.page,
      this.filterRow.filtersChanged
    )
      .pipe(debounceTime(100))
      .subscribe(
        ([queryParams, sorting, pager, filters]: [
          Params,
          Sort,
          PageEvent,
          string
        ]) => {
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
        }
      );
  }

  private handleColumnsChanged(): Subscription {
    return this.columnsConfigChanged.subscribe(_ => {
      this.displayedColumns = this.columnsCfg
        .filter((item: Column) => !item.hidden)
        .map(item => item.name);

      this.displayedColumns.unshift(...this.columnsStart);
      this.displayedColumns.push(...this.columnsEnd);

      this.hideableColumnsCount =
        this.displayedColumns.length - this.persistantColumns.length;

      this.displayedFilterColumns = this.displayedColumns.map(
        item => 'filter_' + item
      );
    });
  }

  private setInitialValues() {
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

  isColumnVisible(column: Column) {
    return !this.columnsCfgMap.get(column.name).hidden;
  }

  private handleColumnVisibilityChange(column: Column, checked: boolean) {
    this.columnsCfgMap.get(column.name).hidden = !checked;

    this.columnsConfigChanged.next();
  }

  private _handleRemove(element): void {
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
}
