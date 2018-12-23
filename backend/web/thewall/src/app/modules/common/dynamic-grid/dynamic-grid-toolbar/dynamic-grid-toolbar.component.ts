import { Component, OnInit, Input } from '@angular/core';

import { FilterRowDirective } from '../../filter-row/filter-row.directive';
import { DynamicGridComponent } from '../dynamic-grid.component';

@Component({
  selector: 'sch-dynamic-grid-toolbar',
  templateUrl: './dynamic-grid-toolbar.component.html',
  styleUrls: ['./dynamic-grid-toolbar.component.scss']
})
export class DynamicGridToolbarComponent {
  @Input()
  filterRow: FilterRowDirective;

  @Input()
  grid: DynamicGridComponent;
}
