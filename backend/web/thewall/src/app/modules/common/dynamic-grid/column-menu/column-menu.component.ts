import { Component, Input, ViewChild } from '@angular/core';
import { MatMenu } from '@angular/material';
import { DynamicGridComponent } from '../dynamic-grid.component';

@Component({
  selector: 'sch-column-menu',
  templateUrl: './column-menu.component.html',
  styleUrls: ['./column-menu.component.scss'],
  exportAs: 'gridColumnMenu'
})
export class ColumnMenuComponent {
  @Input()
  grid: DynamicGridComponent;

  @ViewChild('menu')
  menu: MatMenu;
}
