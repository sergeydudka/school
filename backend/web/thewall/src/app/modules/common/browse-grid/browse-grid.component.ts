import { Component, OnInit, ViewChild, AfterViewInit, OnDestroy } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

import { MatPaginator, MatSort } from '@angular/material';

import { SelectionModel } from '@angular/cdk/collections';

import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { ApiService } from '../../../common/services/api.service';
import { merge, of as observableOf, Subject, Subscription } from 'rxjs';
import { startWith, switchMap, catchError } from 'rxjs/operators';
import { YIIREsponse } from '../../response.model';
import { GridBuilderService } from '../../../common/services/grid-builder.service';

import { Column, ColumnProps } from '../../../common/models/columns/columns.model';

import { FilterRowDirective } from '../filter-row/filter-row.directive';

@Component({
  selector: 'sch-browse-grid',
  templateUrl: './browse-grid.component.html',
  styleUrls: ['./browse-grid.component.css']
})
export class BrowseGridComponent implements OnInit, OnDestroy, AfterViewInit {
  private initialized: boolean;
  private subscriptions: Subscription;

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

  defaultSort;
  defaultSortDir = 'asc';

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private crud: YiiCrudService,
    private api: ApiService,
    private gridBuilder: GridBuilderService
  ) {}

  ngOnInit() {
    // TODO: get all information in before active guard
    this.route.paramMap.subscribe(data => {
      const category = data.get('category'),
        module = data.get('module'),
        api = this.api.getModuleApi(category, module),
        idProperty = this.api.getModuleIdProperty(category, module);

      this.crud.setApi(api);
      this.crud.setIdProperty(idProperty);

      this.idProperty = this.defaultSort = idProperty;
    });
  }

  ngOnDestroy() {
    // clean up subscriptions
    this.subscriptions.unsubscribe();
  }

  ngAfterViewInit() {
    this.subscriptions = merge(this.sort.sortChange, this.paginator.page, this.filterRow.filtersChanged)
      .pipe(
        startWith({
          pageSize: this.pageSize,
          sort: {
            active: this.defaultSort,
            direction: this.defaultSortDir
          }
        }),
        switchMap(defaults => this.crud.list(defaults, this.sort, this.paginator, this.filterRow.value)),
        catchError((...params) => {
          console.log('Error on data retrieving => ', params);
          return observableOf([]);
        })
      )
      .subscribe((result: YIIREsponse) => {
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

  onEdit() {
    this.router.navigate(['detail', this.selection.selected[0][this.idProperty]], {
      relativeTo: this.route
    });
  }

  onRemove() {
    this.crud.delete(this.selection.selected[0][this.idProperty]);
  }
}
