import {
  Component,
  OnInit,
  Optional,
  Input,
  ContentChild,
  AfterContentInit,
  TemplateRef,
  OnDestroy
} from '@angular/core';

import { CdkColumnDef } from '@angular/cdk/table';

import { FilterRowDirective } from './filter-row.directive';
import { FormGroup, FormControl, AbstractControl } from '@angular/forms';

@Component({
  selector: 'uxmat-filter-row-cell',
  templateUrl: './filter-row-cell.component.html',
  styleUrls: ['./filter-row-cell.component.scss']
})
export class FilterRowCellComponent implements OnInit, OnDestroy {
  /**
   * ID of this sort header. If used within the context of a CdkColumnDef
   * this will default to the column's name.
   */
  @Input('uxmatFilterName')
  id: string;

  /**
   * Filter item configuration
   */
  @Input('uxmatFilterCellDef')
  filter: {};

  /**
   * Reference to field template, which will be projected in this component
   */
  @ContentChild(TemplateRef)
  field: TemplateRef<any>;

  filterForm: FormGroup;

  constructor(@Optional() public _filterRow: FilterRowDirective, @Optional() public _cdkColumnDef: CdkColumnDef) {
    if (!_filterRow) {
      throw new Error('No uxmatFilterRow parent directive provided');
    }
  }

  ngOnInit() {
    if (!this.id && this._cdkColumnDef) {
      this.id = this._cdkColumnDef.name;
    }

    this._filterRow.add(this);

    this.filterForm = this._filterRow.filterForm;
  }

  ngOnDestroy() {
    this._filterRow.remove(this);
  }
}
