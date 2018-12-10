import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

// rxjs
import { Observable, of, pipe } from 'rxjs';
import { tap, switchMap } from 'rxjs/operators';

// app specific
import { AppConfigService } from './common/services/app-config.service';
import { UserService } from './common/services/user/user.service';
import { YIIResponse } from './common/models/yii/yii-response.model';
import { Data, Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private _isLoggedIn = false;

  private loginUrl: string;
  private logoutUrl: string;
  private isAuthorizedUrl: string;

  get isLoggedIn() {
    return this._isLoggedIn;
  }

  // url to redict user after login
  redirectUrl;

  constructor(
    private http: HttpClient,
    private router: Router,
    private configService: AppConfigService,
    private userService: UserService
  ) {
    this.init();
  }

  /**
   * Service initialization logic
   * Don't put it in constructor for testability
   */
  protected init() {
    // TODO: get default module from config
    this.redirectUrl = '/articles/article';

    this.configService.config.subscribe(config => {
      // TODO: get URLs fron config
      this.isAuthorizedUrl = 'http://school.local.com/admin/main/auth/';
      this.loginUrl = 'http://school.local.com/admin/main/auth/login/';
      this.logoutUrl = 'http://school.local.com/admin/main/auth/logout/';
    });
  }

  /**
   * Checks whether user is logged into system
   */
  checkIsLoggedIn(): Observable<boolean> {
    if (this._isLoggedIn) return of(true);

    return this.http.get(this.isAuthorizedUrl).pipe(
      tap((response: YIIResponse) => {
        if (!response.status) return;

        this.userService.user = response.result.list;
      }),
      switchMap((response: YIIResponse) => of(!!response.result.count))
    );
  }

  /**
   * Login user into system
   *
   * @param params login credentials
   */
  login(params: Data): Observable<any> {
    if (this._isLoggedIn) return;

    return this.http.post(this.loginUrl, params).pipe(
      tap((response: YIIResponse) => {
        if (!response.status) return;

        this._isLoggedIn = true;

        this.userService.user = response.result.list;
      })
    );
  }

  /**
   * Logout user from system
   */
  logout() {
    if (!this._isLoggedIn) return;

    this.http
      .get(this.logoutUrl)
      .pipe(
        tap((response: YIIResponse) => {
          if (!response.status) return;

          this._isLoggedIn = false;
          this.router.navigate(['/login']);
        })
      )
      .subscribe();
  }
}
