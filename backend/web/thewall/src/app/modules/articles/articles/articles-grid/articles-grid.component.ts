import { Component, OnInit } from '@angular/core';

import { SelectionModel } from '@angular/cdk/collections';

import { Article } from '../../article.model';
import { ArticlesService } from '../../articles.service';
import { YIIREsponse } from '../../../response.model';
import { GridBuilderService } from '../../../../common/services/grid-builder.service';

@Component({
  selector: 'sch-articles-grid',
  templateUrl: './articles-grid.component.html',
  styleUrls: ['./articles-grid.component.css']
})
export class ArticlesGridComponent implements OnInit {
  ARTICLE_DATA: Article[] = [];
  selection = new SelectionModel<Article>(true, []);

  columnsCfg: string[] = [];

  displayedColumns: string[] = [];
  displayedFilterColumns: string[] = [];
  dataSource = this.ARTICLE_DATA;

  constructor(private articlesService: ArticlesService, private gridBuilder: GridBuilderService) {}

  ngOnInit() {
    this.articlesService.list().subscribe((result: YIIREsponse) => {
      this.columnsCfg = this.gridBuilder.getColumns(result);

      this.displayedColumns = this.columnsCfg.map((item: any) => item.name);
      this.displayedColumns.unshift('selection');
      this.displayedColumns.push('actions');

      this.displayedFilterColumns = this.displayedColumns.map(item => 'filter_' + item);

      this.dataSource = result.result.list;
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
    console.log('edit has been called');
  }

  onRemove() {
    console.log('remove has been called');
  }
}
