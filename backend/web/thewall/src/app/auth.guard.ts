import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';

import { AuthService } from './auth.service';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {
  constructor(private authService: AuthService, private router: Router) {}

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): Observable<boolean> | boolean {
    const url = state.url;

    return this.checkLogin(url);
  }

  checkLogin(url: string): Observable<boolean> | boolean {
    if (this.authService.isLoggedIn) {
      this.redirect(url, true);
      return true;
    }

    if (!['/', '/login'].includes(url)) {
      this.authService.redirectUrl = url;
    }

    return this.authService.checkIsLoggedIn().pipe(
      tap(val => {
        this.redirect(url, val);
        return val;
      })
    );
  }

  private redirect(url: string, isLoggedIn: boolean) {
    if (!isLoggedIn) {
      this.router.navigate(['/login']);
    } else {
      // should be executed after return to pass guard logic
      // TODO: why do we need this???
      // in current implementation causes redirect to articles grid
      // setTimeout(() => {
      //   this.router.navigate([this.authService.redirectUrl], {
      //     queryParamsHandling: 'preserve'
      //   });
      // }, 0);
    }
  }
}
