import { Directive } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';

import { Subject } from 'rxjs';

/** Interface for a directive that holds sorting state consumed by `MatSortHeader`. */
export interface MatFilter {
  /** The id of the column being filtered. */
  id: string;

  fieldCfg: any;
}

@Directive({
  selector: '[uxmatFilterRow]'
})
export class FilterRowDirective {
  _filtered = false;

  get filtered() {
    return this._filtered;
  }

  _value: string | null = null;

  get value() {
    return this._value;
  }

  filters = new Map<string, MatFilter>();

  // required to restore state from URL on load
  _initialFilterValues = new Map<string, any>();

  filterForm: FormGroup;

  filtersChanged: Subject<string | null> = new Subject();
  filterInvalid: Subject<void> = new Subject();

  constructor() {}

  ngOnInit() {
    this.filterForm = new FormGroup({});
  }

  apply() {
    if (this.filterForm.invalid) {
      this.filterInvalid.next();
      return;
    }

    this._value = this.getValue();

    if (!this._value) {
      if (this._filtered) this.clear();
      return;
    }

    this.filtersChanged.next(this._value);
    this._filtered = true;

    return;
  }

  clear() {
    this.filterForm.reset();
    this._value = null;

    this._initialFilterValues.clear();

    this.filtersChanged.next(this._value);
    this._filtered = false;
  }

  add(filter: MatFilter) {
    const filterValue = this._initialFilterValues.get(filter.id);
    const value = filterValue ? filterValue.value : null;

    this.filters.set(filter.id, filter);

    const control = new FormControl(value, filter.fieldCfg.filterValidators);
    if (value) {
      control.markAsDirty();
    }

    this.filterForm.addControl(filter.id, control);
  }

  remove(filter: MatFilter) {
    if (!this.filters.has(filter.id)) return;

    this.filterForm.removeControl(filter.id);
    this.filters.delete(filter.id);
  }

  getValue() {
    let result = [];

    for (let key in this.filterForm.controls) {
      const control = this.filterForm.controls[key];

      if (!control.dirty || !control.value) continue;

      result.push({
        field: key,
        operator: '=',
        value: control.value
      });
    }

    return result.length ? JSON.stringify(result) : null;
  }

  setInitialState(filters: string) {
    if (filters) {
      this._setInitialValues(filters);
    }

    this.filtersChanged.next(filters);
  }

  private _setInitialValues(filters: string) {
    const parsedFilters = JSON.parse(filters);

    parsedFilters.forEach(filter => {
      this._initialFilterValues.set(filter.field, filter);
    });

    this._filtered = true;
  }
}
