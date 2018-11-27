import { Component, OnInit, Input, forwardRef } from '@angular/core';
import { FormControl, ControlValueAccessor, NG_VALUE_ACCESSOR } from '@angular/forms';

import { map, switchMap, distinctUntilChanged, debounceTime, tap, defaultIfEmpty } from 'rxjs/operators';
import { Observable, of } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { YIIResponse } from '../../models/yii/yii-response.model';

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
  private _lastValue: string;

  @Input()
  placeholder;

  @Input()
  get value() {
    return this._value;
  }
  set value(val) {
    if (this._value === val) return;

    this._value = val;
    this.propagateState(val);
  }
  private _value;

  @Input()
  url;

  @Input()
  valueField;

  @Input()
  displayField;

  @Input()
  delay = 500;

  propagateState: (val) => any;

  control = new FormControl('');
  options: { valueField: string; displayField: string }[];
  optionsMap: Map<number, string> = new Map();

  constructor(private http: HttpClient) {}

  ngOnInit() {
    this.control.valueChanges
      .pipe(
        debounceTime(this.delay),
        // update host component value
        map(val => {
          // if value is not in list of possible values, just seach
          if (!this.optionsMap.has(val)) {
            this.value = '';
            return (this._lastValue = val);
          } else {
            // otherwise we know that we selected of the options
            this.value = val;
            return this._lastValue;
          }
        }),
        distinctUntilChanged(),
        // TODO: user native Angular get params builder
        switchMap(val => this.http.get(`${this.url}?select={"${this.valueField}":"","${this.displayField}":"${val}"}`)),
        tap((val: YIIResponse) => {
          this.optionsMap.clear();
          this.options = val.result.list.map(val => {
            this.optionsMap.set(val[this.valueField], val[this.displayField]);

            return {
              valueField: val[this.valueField],
              displayField: val[this.displayField]
            };
          });
        })
      )
      .subscribe();
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
  displayFn(): (option: number) => string {
    return option => {
      if (!option) return;

      return this.optionsMap.get(option);
    };
  }
}
