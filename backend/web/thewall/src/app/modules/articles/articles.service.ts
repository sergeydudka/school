import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { YiiCrudService } from '../../common/services/crud/yii-crud/yii-crud.service';
import { AppConfigService } from '../../common/services/app-config.service';

// https://github.com/angular/angular-cli/issues/10170#issuecomment-415758304
@Injectable()
export class ArticlesService extends YiiCrudService {
  constructor(
    protected http: HttpClient,
    private appConfig: AppConfigService
  ) {
    super(http);

    this.appConfig.api.subscribe(data => {
      this.api = data.articles.article.actions;
    });

    this.idProperty = 'article_id';
  }
}
