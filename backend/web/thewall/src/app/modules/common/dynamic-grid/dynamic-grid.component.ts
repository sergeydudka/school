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

import { MakeStateful, Stateful } from 'src/app/stateful';
import { GlobalEventsService } from 'src/app/common/services/global-events/global-events.service';
import { AppConfigService } from 'src/app/common/services/app-config.service';
import { YIIResponse } from 'src/app/common/models/yii/yii-response.model';

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
  stateChanged$: Subject<void> = new Subject();

  private initialized: boolean;
  private subscriptions: Subscription[];
  private routeData: ModuleConfig;

  private autoRefreshInterval: number;
  private autoRefreshIntervalRef: number;
  private refreshTrigger$: Subject<void>;

  idProperty: string;

  /**
   * Currently active column, required to show column menu
   */
  activeColumn: Column = null;

  /**
   * Current record, required to have reference to record on context menu
   */
  activeRecord: Column = null;

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

  pageSizeOptions: number[];
  pageSize: number;

  @ViewChild(MatPaginator)
  paginator: MatPaginator;

  @ViewChild(MatSort)
  sort: MatSort;

  defaultSort: string;
  defaultSortDir: 'asc' | 'desc' = 'asc';

  /**
   * Flag to know whether grid should be refresh on activation
   * Required to keep grids in fresh state after CUD operations
   */
  private reloadOnActivate = false;
  private isActive = false;

  constructor(
    private elRef: ElementRef,
    private route: ActivatedRoute,
    private router: Router,
    private crud: YiiCrudService,
    private api: ApiService,
    private configService: AppConfigService,
    private gridBuilder: GridBuilderService,
    private formService: FormService,
    private activeModules: ActiveModulesService,
    private overlayService: OverlayService,
    private globalEventsService: GlobalEventsService
  ) {}

  ngOnInit() {
    this.isActive = true;

    this.routeData = this.route.snapshot.data as ModuleConfig;

    this.activeModules.add(this.routeData);

    this.refreshTrigger$ = new Subject();

    this.setupSubscriptions();
    this.setInitialValues();
  }

  /**
   * Custom event triggered by uxrouter-outlet
   * allows user to take action when component reattached after detach
   */
  nguxAttached() {
    this.isActive = true;
    if (this.reloadOnActivate) {
      this.forceGridRefresh();
    }
  }

  /**
   * Custom event triggered by uxrouter-outlet
   * allows user to take action when component detached
   */
  nguxDetached() {
    this.isActive = false;
  }

  ngOnDestroy() {
    // clean up subscriptions
    const routeSnapshot = this.route.snapshot.data as ModuleConfig;

    this.activeModules.remove(routeSnapshot);

    this.subscriptions.forEach(subscription => subscription.unsubscribe());
  }

  /**
   * Whether all grid items selected or not
   */
  isAllSelected(): boolean {
    const numSelected = this.selection.selected.length;
    const numRows = this.dataSource.length;
    return numSelected === numRows;
  }

  /**
   * Togggles selection all/none
   */
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

  /**
   * Forces grid refresh even if nothing has changed
   */
  forceGridRefresh() {
    this.refreshTrigger$.next();
  }

  handleAutoRefreshChanged(value: MatCheckboxChange) {
    if (value.checked) {
      this.autoRefreshIntervalRef = window.setInterval(() => {
        this.forceGridRefresh();
      }, this.autoRefreshInterval);
    } else {
      window.clearInterval(this.autoRefreshIntervalRef);
    }
  }

  /**
   * Whether it's allow to hide this column or not
   *
   * @param column current column config
   */
  allowColumnHide(column: Column): boolean {
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

  calculateStateKey() {
    return this.routeData.module + this.constructor.name;
  }

  /**
   * Changes sorting for currently active or for provided column
   *
   * If there is no active column or user didn't provided one
   * sorting will be make by `idProperty` column
   *
   * @param sortDir new sort direction
   * @param column target column
   */
  changeSort(sortDir: 'asc' | 'desc', column?: Column) {
    const name = column
      ? column.name
      : this.activeColumn
        ? this.activeColumn.name
        : this.idProperty;

    // skip if already active
    if (name === this.sort.active && sortDir === this.sort.direction) {
      return;
    }

    this.sort.sort({
      id: name,
      start: sortDir,
      disableClear: true
    });
  }

  isColumnVisible(column: Column) {
    return !this.columnsCfgMap.get(column.name).hidden;
  }

  /**
   * Setup all necessary subscription on grid init.
   * This way it's easier to control from which subscriptions
   * we need to unsubscribe on destroy
   */
  private setupSubscriptions() {
    this.subscriptions = [
      this.setupUrlSync(),
      this.handleColumnsChanged(),
      this.handleDataLoad()
    ];

    const filtersInavlid = this.filterRow.filterInvalid.subscribe(() => {
      this.formService.showErrors(this.filterRow.filterForm);
    });

    // subscribe to global entity action events
    const entityChanged = this.globalEventsService.entityChanged$.subscribe(
      data => {
        if (this.isActive || this.routeData.module !== data.type) return;

        this.reloadOnActivate = true;
      }
    );

    this.subscriptions.push(filtersInavlid, entityChanged);
  }

  /**
   * Method responsible for loading data on parameters change
   */
  private handleDataLoad(): Subscription {
    return combineLatest(
      this.sort.sortChange,
      this.paginator.page,
      this.filterRow.filtersChanged,
      this.refreshTrigger$
    ).subscribe(([sort, pager, filters]: [Sort, PageEvent, string, void]) =>
      this.crud.list(sort, pager, filters, (result?: YIIResponse) => {
        // in case of an error
        if (!result) return;

        // we are only interested on intial columns config
        // no need to rerender columns each time
        if (!this.initialized) {
          const columnsCfg = this.gridBuilder.generateColumnsData(result);

          // we set initial values to allow initial state calculation
          this.setColumnsCfg(columnsCfg);

          // required by Stateful decorator, to signalize that component
          // is ready for state restoration
          this.stateChanged$.next();

          // we need to call one more time once state is restored
          this.setColumnsCfg(this.columnsCfg);

          this.initialized = true;
        }

        this.dataSource = result.result.list;
        this.totalCount = result.result.total;
      })
    );
  }

  /**
   * Helper method to set both columnsCfg and columnsCfgMap by providing either of those
   *
   * @param cfg new columns config
   */
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

  /**
   * Method responsible for kipping URL in sync with current application state
   */
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

  /**
   * Helper method to set grid columns on config change
   */
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

  /**
   * Sets default grid config values using provided user config and URL parameters
   */
  private setInitialValues() {
    const { category, module } = this.route.snapshot.data,
      api = this.api.getModuleApi(category, module),
      idProperty = this.api.getModuleIdProperty(category, module);

    this.crud
      .setTarget(this.elRef)
      .setApi(api)
      .setIdProperty(idProperty)
      .setEntity(module);

    this.idProperty = idProperty;

    this.configService.config.subscribe(data => {
      this.pageSizeOptions = data.pagination.pageSizes;
      this.pageSize = data.pagination.perPage;
      this.autoRefreshInterval = data.pagination.autoRefreshInterval;
    });

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

    // trigger initial value, otherwise load would not happed due to
    // how combineLatest works
    this.refreshTrigger$.next();
  }

  private handleColumnVisibilityChange(column: Column, checked: boolean) {
    this.columnsCfgMap.get(column.name).hidden = !checked;

    this.columnsConfigChanged.next();
  }

  private _handleRemove(element): void {
    this.crud.delete(element[this.idProperty], result => {
      if (!result) return;

      this.forceGridRefresh();
    });
  }
}
