import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';


import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root',
})
export class AuthGuard implements CanActivate {
  constructor(private authService: AuthService, private router: Router) { }

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
    const url = state.url;

    return this.checkLogin(url);
  }

  checkLogin(url: string) {
    if (this.authService.isLoggedIn) return true;

    this.authService.redirectUrl = url;

    this.router.navigate(['/login']);
    return false;
  }
}
