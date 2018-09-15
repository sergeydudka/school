import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AppConfigService {
  private _config;

  constructor(private http: HttpClient) {}

  get config() {
    return this._config;
  }
}
