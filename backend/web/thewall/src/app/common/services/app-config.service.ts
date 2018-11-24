import { environment } from 'src/environments/environment';

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { BehaviorSubject } from 'rxjs';
import { YIIResponse } from '../models/yii/yii-response.model';

import { AppConfig } from '../models/config/app-config.model';
import { PersistanceService } from './persistance/persistance.service';

@Injectable({
  providedIn: 'root'
})
export class AppConfigService {
  private _config: BehaviorSubject<AppConfig>;
  get config() {
    return this._config;
  }

  private configUrl = environment.configUrl;

  constructor(private http: HttpClient, private persistanceService: PersistanceService) {
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
    this.http.get(this.configUrl).subscribe((response: YIIResponse) => {
      const config = response.result.list as AppConfig;

      const edition = this.persistanceService.get('edition');

      config.apiUrl = '/main/menu/';

      if (edition) {
        config.edition = JSON.parse(edition);
      } else {
        this.persistanceService.set('edition', JSON.stringify(config.edition));
      }

      this._config.next(config);
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
