import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

import { MatPaginator, MatSort } from '@angular/material';

import { SelectionModel } from '@angular/cdk/collections';

import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { ApiService } from '../../../common/services/api.service';
import { merge, Observable, of as observableOf } from 'rxjs';
import { startWith, switchMap, catchError } from 'rxjs/operators';
import { YIIREsponse } from '../../response.model';
import { GridBuilderService } from '../../../common/services/grid-builder.service';

@Component({
  selector: 'sch-browse-grid',
  templateUrl: './browse-grid.component.html',
  styleUrls: ['./browse-grid.component.css']
})
export class BrowseGridComponent implements OnInit {
  idProperty;

  selection = new SelectionModel<any>(true, []);

  columnsCfg: string[] = [];
  displayedColumns: string[] = [];
  displayedFilterColumns: string[] = [];

  dataSource;
  totalCount: number;
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
    this.route.paramMap.subscribe(data => {
      const category = data.get('category'),
        module = data.get('module'),
        api = this.api.getModuleApi(category, module),
        idProperty = this.api.getModuleIdProperty(category, module);

      this.crud.setApi(api);
      this.crud.setIdProperty(idProperty);

      this.idProperty = this.defaultSort = idProperty;

      merge(this.sort.sortChange, this.paginator.page)
        .pipe(
          startWith({
            pageSize: this.pageSize,
            sort: {
              active: this.defaultSort,
              direction: this.defaultSortDir
            }
          }),
          switchMap(defaults => {
            return this.crud.list(defaults, this.sort, this.paginator);
          }),
          catchError((...params) => {
            console.log('Error on data retrieving => ', params);
            return observableOf([]);
          })
        )
        .subscribe((result: YIIREsponse) => {
          this.columnsCfg = this.gridBuilder.getColumns(result);

          this.displayedColumns = this.columnsCfg.map((item: any) => item.name);
          this.displayedColumns.unshift('selection');
          this.displayedColumns.push('actions');

          this.displayedFilterColumns = this.displayedColumns.map(item => 'filter_' + item);

          this.dataSource = result.result.list;

          this.totalCount = result.result.total;
        });
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
