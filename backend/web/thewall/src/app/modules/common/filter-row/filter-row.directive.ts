import { Directive, Input } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';

import { Subject } from 'rxjs';

/** Interface for a directive that holds sorting state consumed by `MatSortHeader`. */
export interface MatFilter {
  /** The id of the column being filtered. */
  id: string;
}

@Directive({
  selector: '[uxmatFilterRow]'
})
export class FilterRowDirective {
  _filtered = false;

  get filtered() {
    return this._filtered;
  }

  _value: {}; // TODO: proper typings

  get value() {
    return this._value;
  }

  filters = new Map<string, MatFilter>();

  filterForm: FormGroup;

  filtersChanged: Subject<any>; // TODO: proper typings

  constructor() {}

  ngOnInit() {
    this.filtersChanged = new Subject();

    this.filterForm = new FormGroup({});
  }

  apply() {
    this._value = this.filterForm.value;

    this.filtersChanged.next(this._value);
    this._filtered = true;
  }

  clear() {
    this.filterForm.reset();
    this._value = this.filterForm.value;

    this.filtersChanged.next(this._value);
    this._filtered = false;
  }

  add(filter: MatFilter) {
    this.filters.set(filter.id, filter);

    this.filterForm.addControl(filter.id, new FormControl(''));
  }

  remove(filter: MatFilter) {
    if (!this.filters.has(filter.id)) {
      throw new Error(`Trying to non-existing filter ${filter.id}`);
    }

    this.filterForm.removeControl(filter.id);
    this.filters.delete(filter.id);
  }
}
