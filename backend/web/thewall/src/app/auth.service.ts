import { Injectable } from '@angular/core';
import { Observable, of, pipe } from 'rxjs';
import { tap, delay } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private _isLoggedIn = true;

  get isLoggedIn() {
    return this._isLoggedIn;
  }

  // url to redict user after login
  redirectUrl;

  constructor() { }

  login(): Observable<boolean> {
    return of(true).pipe(
      delay(1000),
      tap(val => this._isLoggedIn = true)
    )
  }

  logout() {
    this._isLoggedIn = false;
  }
}
