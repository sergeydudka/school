import { Injectable } from '@angular/core';

import { BehaviorSubject } from 'rxjs';

import { MenuNode } from './menu.model';
import { ApiService } from '../../common/services/api.service';

@Injectable()
export class MenuService {
  menuData = new BehaviorSubject([]);

  constructor(private api: ApiService) {
    this.getMenu();
  }

  getMenu() {
    this.api.data.subscribe(data => {
      const menu = [];

      for (const moduleKey in data) {
        const module = data[moduleKey];

        const menuItem: MenuNode = {
          title: moduleKey,
          children: [],
          url: `/${moduleKey}/${moduleKey}`
        };

        for (const submoduleKey in module) {
          const submodule = module[submoduleKey];

          const menuSubItem: MenuNode = {
            title: submoduleKey,
            url: `${moduleKey}/${submoduleKey}`
          };

          menuItem.children.push(menuSubItem);
        }

        menu.push(menuItem);
      }

      this.menuData.next(menu);
    });
  }
}
