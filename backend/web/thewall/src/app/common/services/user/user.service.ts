import { Injectable } from '@angular/core';

import { User } from './user.model';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  private _user: User;

  get user() {
    return this._user;
  }

  set user(user: User) {
    this._user = user;
  }

  constructor() {}
}
