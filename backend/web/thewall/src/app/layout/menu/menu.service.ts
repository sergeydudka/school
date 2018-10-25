import { Injectable } from '@angular/core';

import { BehaviorSubject } from 'rxjs';

import { MenuNode } from './menu.model';
import { ApiService } from '../../common/services/api.service';
import { ModuleConfig } from './module-config.model';

@Injectable({
  providedIn: 'root'
})
export class MenuService {
  menuData = new BehaviorSubject([]);
  modules: ModuleConfig[] = [];

  constructor(private api: ApiService) {
    this.getMenu();
  }

  getMenu() {
    this.api.data.subscribe(data => {
      const menu = [];

      for (const cat in data) {
        const category = data[cat];

        const menuItem: MenuNode = {
          title: category.label,
          children: [],
          url: `/${cat}/${category.defaultRoute}`
        };

        for (const mod in category.list) {
          const module = category.list[mod];

          const menuSubItem: MenuNode = {
            title: module.label,
            url: `/${cat}/${mod}`
          };

          this.modules.push({
            uniqueId: module.model,
            title: module.label,
            category: cat,
            module: mod,
            addToTabs: module.addToTabs !== undefined ? module.addToTabs : true,
            link: `/${cat}/${mod}`,
            angularModule: module.module || 'BrowseGrid',
          });

          menuItem.children.push(menuSubItem);
        }

        menu.push(menuItem);
      }

      this.menuData.next(menu);
    });
  }
}
