import { Injectable } from '@angular/core';

import { BehaviorSubject } from 'rxjs';

import { MenuNode } from './menu.model';
import { AppConfigService } from '../../common/services/app-config.service';

@Injectable()
export class MenuService {
  menuData = new BehaviorSubject([]);

  constructor(private appConfig: AppConfigService) {
    this.getMenu();
  }

  getMenu() {
    this.appConfig.api.subscribe(data => {
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
            url: submodule.url
          };

          menuItem.children.push(menuSubItem);
        }

        menu.push(menuItem);
      }

      this.menuData.next(menu);
    });
  }
}
