import { Component, OnInit } from '@angular/core';
import { MenuService } from './menu.service';

import { NestedTreeControl } from '@angular/cdk/tree';
import { MatTreeNestedDataSource } from '@angular/material/tree';

class MenuNode {
  children?: MenuNode[];
  title: string;
  url: string;
}

@Component({
  selector: 'sch-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css'],
  providers: [MenuService]
})
export class MenuComponent {
  initialized = false;

  nestedTreeControl: NestedTreeControl<MenuNode>;
  nestedDataSource: MatTreeNestedDataSource<MenuNode>;

  constructor(menuService: MenuService) {
    this.nestedTreeControl = new NestedTreeControl<MenuNode>(this._getChildren);
    this.nestedDataSource = new MatTreeNestedDataSource();

    menuService.dataChange.subscribe(data => {
      this.initialized = true;

      return (this.nestedDataSource.data = data);
    });
  }

  hasNestedChild = (_: number, nodeData: MenuNode) => nodeData.children && nodeData.children.length;

  getUrl = (nodeData: MenuNode) => {
    let { url } = nodeData;

    const len = url.length;
    const lastLetter = url.charAt(len - 1);

    if (lastLetter !== 's') {
      if (lastLetter === 'y') {
        url = url.slice(0, len - 1) + 'ies';
      } else {
        url += 's';
      }
    }

    return url;
  };

  private _getChildren = (node: MenuNode) => node.children;
}
