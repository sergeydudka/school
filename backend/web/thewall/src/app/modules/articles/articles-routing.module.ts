import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ArticlesComponent } from './articles.component';
import { ArticlesGridComponent } from './articles/articles-grid/articles-grid.component';
import { ArticleDetailComponent } from './articles/article-detail/article-detail.component';

const routes: Routes = [
  {
    path: '',
    children: [
      {
        path: 'articles',
        component: ArticlesGridComponent
      },
      {
        path: 'article/:id',
        component: ArticleDetailComponent
      },
      {
        path: 'article',
        component: ArticleDetailComponent
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ArticlesRoutingModule {}
