import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ArticlesRoutingModule } from './articles-routing.module';
import { ArticlesGridComponent } from './articles/articles-grid/articles-grid.component';
import { BrowseGridModule } from '../common/browse-grid/browse-grid.module';
import { DetailFormModule } from '../common/detail-form/detail-form.module';

import { ArticlesComponent } from './articles.component';
import { ArticleDetailComponent } from './articles/article-detail/article-detail.component';

@NgModule({
  declarations: [ArticlesComponent, ArticlesGridComponent, ArticleDetailComponent],
  imports: [CommonModule, ArticlesRoutingModule, BrowseGridModule, DetailFormModule]
})
export class ArticlesModule {}
