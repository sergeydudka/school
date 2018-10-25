import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { BehaviorSubject } from 'rxjs';
import { YIIResponse } from '../models/yii/yii-response.model';

@Injectable({
  providedIn: 'root'
})
export class AppConfigService {
  private _config: BehaviorSubject<any>;
  get config() {
    return this._config;
  }

  // TODO: dynamic value here ???
  private configUrl = 'http://school.local.com/admin/main/config';

  constructor(private http: HttpClient) {
    this.init();
  }

  /**
   * Force fetching of new config
   */
  reload() {
    // if config not loaded yet, no need to load it again
    if (!this._config) return;

    this.fetch();
  }

  private init() {
    this._config = new BehaviorSubject(null);

    this.fetch();
  }

  /**
   * Loads latests config from server
   */
  private fetch() {
    this.http.get(this.configUrl)
    .subscribe((response: YIIResponse) => {
      const menu = response.result.list;
      this._config.next(menu);
    });
  }
}

// Factory is used on applicaiton bootstrap
export function initConfigFactory(config: AppConfigService) {
  return () =>
    new Promise((resolve, reject) => {
      config.config.subscribe(val => {
        if (!val) return;

        resolve();
      });
    });
}
