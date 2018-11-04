import { Component, OnInit, Input, forwardRef } from '@angular/core';
import { FormControl, ControlValueAccessor, NG_VALUE_ACCESSOR } from '@angular/forms';

import { map, switchMap, mergeMap, distinctUntilChanged, debounceTime, tap } from 'rxjs/operators';
import { Observable, of } from 'rxjs';
import { HttpClient } from '@angular/common/http';

// https://blog.thoughtram.io/angular/2016/07/27/custom-form-controls-in-angular-2.html

@Component({
  selector: 'sch-search-field',
  templateUrl: './search-field.component.html',
  styleUrls: ['./search-field.component.scss'],
  providers: [
    {
      provide: NG_VALUE_ACCESSOR,
      // SearchFieldComponent not availiable at this point
      // forwardRef function called when SearchFieldComponent is defined
      // and this is why we can return instance here
      // https://blog.thoughtram.io/angular/2015/09/03/forward-references-in-angular-2.html#so-the-class-must-always-be-declared-before-its-usage
      useExisting: forwardRef(() => SearchFieldComponent),
      multi: true
    }
  ]
})
export class SearchFieldComponent implements OnInit, ControlValueAccessor {
  @Input()
  placeholder;
  @Input()
  _value;

  get value() {
    return this._value;
  }

  set value(val) {
    val = typeof val === 'string' ? null : val;

    if (this._value === val) return;

    this._value = val;
    this.propagateState(val ? val.valueField : val);
  }

  @Input()
  url;
  @Input()
  valueField;
  @Input()
  displayField;
  @Input()
  delay = 500;

  propagateState;

  control = new FormControl('');
  options: Observable<{ valueField: string; displayField: string }[]>;

  constructor(private http: HttpClient) {}

  ngOnInit() {
    this.options = this.control.valueChanges.pipe(
      debounceTime(this.delay),
      // update host component value
      tap(val => (this.value = val)),
      map(val => (typeof val === 'string' ? val : val.displayField)),
      distinctUntilChanged(),
      // TODO: user native Angular get params builder
      switchMap(val => this.http.get(`${this.url}?select={"${this.valueField}":"","${this.displayField}":"${val}"}`)),
      mergeMap((val: any) => {
        return of(
          val.result.list.map(val => ({
            valueField: val[this.valueField],
            displayField: val[this.displayField]
          }))
        );
      })
    );
  }

  writeValue(val) {
    this._value = val;
  }

  registerOnChange(fn) {
    this.propagateState = fn;
  }

  registerOnTouched() {
    // console.log('register on touched');
  }

  /**
   * Helper function to extract display value for option
   *
   * @param option selected option
   */
  displayFn(option): string {
    return option.displayField;
  }
}
