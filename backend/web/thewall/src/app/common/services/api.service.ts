import { Injectable } from '@angular/core';

import { BehaviorSubject } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private _api;
  private apiUrl = 'http://school.local.com/admin/main/menu/';

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

        // for (let cat in menu) {
        //   let category = menu[cat];

        //   for (let mod in category.list) {
        //     let module = category.list[mod];

        //     for (let act in module.actions) {
        //       let action = module.actions[act];

        //       console.log('action => ', action);
        //     }
        //   }
        // }
        // console.log('response => ', response);

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
        // console.log('config => ', config);
      }
    }

    return allowed;
  }

  getModuleIdProperty(category: string, module: string) {
    const api = this._api.getValue(),
      idProperty = api[category].list[module].primnaryKey;

    return idProperty;
  }

  getModuleApi(category: string, module: string): {} {
    const api = this._api.getValue(),
      moduleApi = api[category].list[module].actions;

    return moduleApi;
  }
}

export function initApiFactory(api: ApiService) {
  return () => api.getApi();
}
