import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'sch-dynamic-filter-row-cell',
  templateUrl: './dynamic-filter-row-cell.component.html',
  styleUrls: ['./dynamic-filter-row-cell.component.scss']
})
export class DynamicFilterRowCellComponent {
  @Input()
  filter;
}
