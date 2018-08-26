import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { Observable } from 'rxjs';
import { BehaviorSubject } from 'rxjs';

import { MenuNode, Menu } from './menu.model';

@Injectable({
  providedIn: 'root'
})
export class MenuService {
  dataChange = new BehaviorSubject([]);

  menuData: MenuNode;

  get data(): MenuNode[] {
    return this.dataChange.value;
  }
  ignoreSubModules = ['default'];

  constructor(private http: HttpClient) {
    this.initialize();
  }

  initialize() {
    this.getInfo().subscribe(data => {
      // const menuData = this.buildFileTree(data);

      this.dataChange.next(data);
    });
  }

  getMenu() {
    /*
    return Observable.create(observer => {
      this.getInfo().subscribe(dataObject => {
        const data = this.buildFileTree(dataObject, 0);

        console.log('data in service => ', data);

        // this.dataChange.next(data);
        observer.next(data);
        // observer.complete();
      });
    });
    */
  }

  private getInfo() {
    return Observable.create(observer => {
      this.http.get('http://school.local.com/admin/menu/').subscribe((response: Menu) => {
        const data: MenuNode[] = [];

        for (const moduleKey in response.result.list) {
          const module = response.result.list[moduleKey];
          const menuItem: MenuNode = {
            title: moduleKey,
            children: [],
            url: `/${moduleKey}/${moduleKey}`
          };

          for (const submoduleKey in module) {
            if (this.ignoreSubModules.includes(submoduleKey)) continue;

            const submodule = module[submoduleKey];

            const menuSubItem: MenuNode = {
              title: submoduleKey,
              url: submodule.url
            };

            menuItem.children.push(menuSubItem);
          }

          data.push(menuItem);
        }

        observer.next(data);
        observer.complete();
      });
    });
  }

  // private buildFileTree(data: Array<MenuNode>): MenuNode[] {
  //   console.log('data => ', data);
  //   return data.map(value => {
  //     const node = new MenuNode();

  //     node.title = value.title;

  //     if (value.children) {
  //       node.children = this.buildFileTree(value.children);
  //     }

  //     return node;
  //   });
  // }
}
