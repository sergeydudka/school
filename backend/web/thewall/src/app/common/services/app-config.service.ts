import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AppConfigService {
  private _config;
  private configUrl = 'http://school.local.com/admin/main/config';

  constructor(private http: HttpClient) {}

  getConfig(): Promise<any> {
    if (!this._config) {
      this._config = new BehaviorSubject(null);
    }

    return new Promise((resolve, reject) => {
      this.http.get(this.configUrl).subscribe((response: any) => {
        const menu = response.result.list;

        this._config.next(menu);

        resolve();
      });
    });
  }

  get config() {
    return this._config;
  }
}

export function initConfigFactory(config: AppConfigService) {
  return () => config.getConfig();
}
