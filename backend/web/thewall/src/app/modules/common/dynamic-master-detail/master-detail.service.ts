import { Injectable } from '@angular/core';
import { Route, CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs';
import { ApiService } from '../../../common/services/api.service';

@Injectable()
export class MasterDetailService implements CanActivate {
  constructor(private api: ApiService) {}

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot
  ): Observable<boolean> | Promise<boolean> | boolean {
    // console.log('on can activate => ', route);
    // console.log('state => ', state);

    const module = route.paramMap.get('module');

    // console.log(`Loading module: ${module}`);

    return this.api.canAccess(module);
  }
}
