import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AppConfigService {
  private _config;
  private _api;

  constructor(private http: HttpClient) {
    this._api = new BehaviorSubject(null);

    this.getApi();
  }

  private getApi() {
    this.http.get('http://school.local.com/admin/menu/')
      .subscribe((response: any) => {
        this._api.next(response.result.list);

        console.log('response.result.list => ', response.result.list);
      });
  }

  get api() {
    return this._api;
  }

  get config() {
    return this._config;
  }
}
