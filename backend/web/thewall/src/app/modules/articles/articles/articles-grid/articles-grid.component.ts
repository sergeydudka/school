import { Component, OnInit } from '@angular/core';

import { Article } from '../../article.model';
import { ArticlesService } from '../../articles.service';

@Component({
  selector: 'sch-articles-grid',
  templateUrl: './articles-grid.component.html',
  styleUrls: ['./articles-grid.component.css']
})
export class ArticlesGridComponent implements OnInit {
  ARTICLE_DATA: Article[];

  displayedColumns: string[] = [
    'article_id',
    'title',
    'created_at',
    'updated_at'
    // 'article_group_id',
    // 'created_by',
    // 'updated_by',
    // 'difficult_id'
  ];
  dataSource = this.ARTICLE_DATA;

  constructor(private articlesService: ArticlesService) {}

  ngOnInit() {
    this.articlesService.dataChange.subscribe((result: Article[]) => {
      this.dataSource = result;
    });
  }
}
