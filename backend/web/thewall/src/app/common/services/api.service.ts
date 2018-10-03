import { Injectable } from '@angular/core';

import { BehaviorSubject } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private _api;
  private apiUrl = 'http://school.local.com/admin/main/menu/';
  private _apiById;

  constructor(private http: HttpClient) {}

  /**
   * Function gets called on applcation initialization
   * Provides configuration for application routes
   */
  getApi(): Promise<any> {
    if (!this._api) {
      this._api = new BehaviorSubject(null);
    }

    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl).subscribe((response: any) => {
        const menu = response.result.list;

        this._prepareApiById(menu);

        this._api.next(menu);

        resolve();
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
  getModuleApi(category: string, module: string): {} {
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
    const result = this._apiById[key];

    if (!result) {
      throw new Error(`No URL provided for ${key}.`);
    }

    return result;
  }

  /**
   * Prepares map for module URLs by idProperty to have
   * easy access to it later in application
   *
   * @param menu menu config
   */
  _prepareApiById(menu: {}): void {
    const apiById = {};

    for (const cat in menu) {
      const category = menu[cat];

      for (const mod in category.list) {
        const module = category.list[mod];

        apiById[module.primaryKey] = module.url;
      }
    }

    this._apiById = apiById;
  }
}

export function initApiFactory(api: ApiService) {
  return () => api.getApi();
}
