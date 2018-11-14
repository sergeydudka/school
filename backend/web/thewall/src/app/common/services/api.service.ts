import { Injectable } from '@angular/core';
import { Params } from '@angular/router';
import { HttpClient } from '@angular/common/http';

import { BehaviorSubject } from 'rxjs';

import { AppConfigService } from './app-config.service';

import { AppConfig } from '../models/config';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private _api: BehaviorSubject<Params>;
  private apiById: Params;
  private baseURL: string;

  constructor(private http: HttpClient, private configService: AppConfigService) {}

  /**
   * Function gets called on applcation initialization
   * Provides configuration for application routes
   */
  getApi(): Promise<any> {
    if (!this._api) {
      this._api = new BehaviorSubject(null);
    }

    return new Promise((resolve, reject) => {
      this.configService.config.subscribe((config: AppConfig) => {
        if (!config) return;

        this.baseURL = `${config.baseUrl}/${config.edition.url}`;

        const apiUrl = this.prepareUrl(config.apiUrl);

        this.http.get(apiUrl).subscribe((response: any) => {
          const menu = response.result.list;

          this.prepareApiAndAddApiById(menu);
          this._api.next(menu);
          resolve();
        });
      });
    });
  }

  get data() {
    return this._api;
  }

  /**
   * Checks wheter user has acees to specific path
   *
   * @param url URL to check
   */
  canAccess(url: string): boolean {
    let allowed = true;

    const api = this._api.getValue();

    if (api && api[url]) {
      for (let i in api[url]) {
        let config = api[url][i];

        // TODO:
      }
    }

    return allowed;
  }

  /**
   * Returns entity id property by category and module
   *
   * @param category category alias
   * @param module module alias
   */
  getModuleIdProperty(category: string, module: string): string {
    const api = this._api.getValue(),
      idProperty = api[category].list[module].primaryKey;

    return idProperty;
  }

  /**
   * Returns module API by category and module
   *
   * @param category category alias
   * @param module module alias
   */
  getModuleApi(category: string, module: string): Params {
    const api = this._api.getValue(),
      moduleApi = api[category].list[module].actions;

    return moduleApi;
  }

  /**
   * Returns URL for entity by it's primary key
   *
   * @param key id property of entity
   */
  getApiById(key: string): string {
    const result = this.apiById[key];

    if (!result) {
      throw new Error(`No URL provided for ${key}.`);
    }

    return result;
  }

  /**
   * Assambles corrent URL based on params
   *
   * @param url
   */
  private prepareUrl(url: string): string {
    return this.baseURL + url;
  }

  /**
   * Prepares map for module URLs by idProperty to have
   * easy access to it later in application
   *
   * @param menu menu config
   */
  private prepareApiAndAddApiById(menu: {}): void {
    const apiById = {};

    for (const cat in menu) {
      const category = menu[cat];

      for (const mod in category.list) {
        const module = category.list[mod];

        module.url = this.prepareUrl(module.url);

        for (const act in module.actions) {
          const action = module.actions[act];

          action.url = this.prepareUrl(action.url);
        }

        apiById[module.primaryKey] = module.url;
      }
    }

    this.apiById = apiById;
  }
}

export function initApiFactory(api: ApiService) {
  return () => api.getApi();
}
