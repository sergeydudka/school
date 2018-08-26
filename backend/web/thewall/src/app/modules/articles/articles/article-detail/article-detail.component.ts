import { Component, OnInit } from '@angular/core';
import { Article } from '../../article.model';
import { ActivatedRoute, Router, ParamMap } from '@angular/router';
import { ArticlesService } from '../../articles.service';

import { switchMap } from 'rxjs/operators';
import { Observable } from 'rxjs';

import { YIIREsponse } from '../../../response.model';

@Component({
  selector: 'sch-article-detail',
  templateUrl: './article-detail.component.html',
  styleUrls: ['./article-detail.component.css']
})
export class ArticleDetailComponent implements OnInit {
  article = {};

  constructor(private route: ActivatedRoute, private router: Router, private articleService: ArticlesService) {}

  ngOnInit() {
    // console.log('test => ', this.route.paramMap);

    // Dynamic way, need to figure out how to make it work
    /*
    this.article = this.route.paramMap.pipe(
      switchMap((params: ParamMap) => {
        console.log('params => ', params);
        return this.articleService.getArticle(params.get('id'));
      })
    );
    */

    // Static way, only for one instance of component (doesn't support ID changes)
    const id = this.route.snapshot.paramMap.get('id');

    if (!id) return;

    this.articleService.getArticle(id).subscribe((data: YIIREsponse) => {
      this.article = data.result.list;
    });
  }

  onSubmit(form) {
    this.articleService.saveArticle(this.article);
  }
}
