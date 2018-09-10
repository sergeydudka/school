// angular modules
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

// project modules
import { ArticlesRoutingModule } from './articles-routing.module';
import { BrowseGridModule } from '../common/browse-grid/browse-grid.module';
import { DetailFormModule } from '../common/detail-form/detail-form.module';

// project components
import { ArticlesGridComponent } from './articles/articles-grid/articles-grid.component';
import { ArticlesComponent } from './articles.component';
import { ArticleDetailComponent } from './articles/article-detail/article-detail.component';
import { ArticlesService } from './articles.service';

@NgModule({
  declarations: [ArticlesComponent, ArticlesGridComponent, ArticleDetailComponent],
  imports: [CommonModule, ArticlesRoutingModule, BrowseGridModule, DetailFormModule],
  providers: [ArticlesService]
})
export class ArticlesModule { }
