import { Component } from '@angular/core';
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
  styleUrls: ['./menu.component.scss'],
  providers: [MenuService]
})
export class MenuComponent {
  nestedTreeControl: NestedTreeControl<MenuNode>;
  nestedDataSource: MatTreeNestedDataSource<MenuNode>;

  constructor(menuService: MenuService) {
    this.nestedTreeControl = new NestedTreeControl<MenuNode>(this._getChildren);
    this.nestedDataSource = new MatTreeNestedDataSource();

    menuService.menuData.subscribe(data => {
      return (this.nestedDataSource.data = data);
    });
  }

  hasNestedChild = (_: number, nodeData: MenuNode) => nodeData.children && nodeData.children.length;

  getUrl = (nodeData: MenuNode) => {
    let { url } = nodeData;

    return url;
  };

  private _getChildren = (node: MenuNode) => node.children;
}
