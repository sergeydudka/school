import { Component, OnInit, Input, forwardRef, HostBinding, Optional, Self, ElementRef } from '@angular/core';
import { FormControl, ControlValueAccessor, NgControl } from '@angular/forms';
import { FocusMonitor } from '@angular/cdk/a11y';
import { coerceBooleanProperty } from '@angular/cdk/coercion';

import { MatFormFieldControl } from '@angular/material';

import { map, switchMap, distinctUntilChanged, debounceTime, tap } from 'rxjs/operators';
import { Subject } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { YIIResponse } from '../../models/yii/yii-response.model';

// https://blog.thoughtram.io/angular/2016/07/27/custom-form-controls-in-angular-2.html

@Component({
  selector: 'sch-search-field',
  templateUrl: './search-field.component.html',
  styleUrls: ['./search-field.component.scss'],
  providers: [
    {
      provide: MatFormFieldControl,
      useExisting: SearchFieldComponent
    }
  ]
})
export class SearchFieldComponent implements OnInit, ControlValueAccessor {
  private _lastValue: string;
  private focused = false;

  static nextId = 0;
  @HostBinding()
  id = `example-tel-input-${SearchFieldComponent.nextId++}`;

  @HostBinding('attr.aria-describedby')
  describedBy = '';

  @HostBinding('class.floating')
  get shouldLabelFloat() {
    return this.focused || !this.empty;
  }

  setDescribedByIds(ids: string[]) {
    this.describedBy = ids.join(' ');
  }

  stateChanges = new Subject<void>();

  @Input()
  get placeholder() {
    return this._placeholder;
  }
  set placeholder(plh) {
    this._placeholder = plh;
    this.stateChanges.next();
  }
  private _placeholder: string;

  @Input()
  get value() {
    return this._value;
  }
  set value(val) {
    if (this._value === val) return;

    this._value = val;
    this.propagateState(val);

    this.stateChanges.next();
  }
  private _value;

  @Input()
  get disabled() {
    return this._disabled;
  }
  set disabled(dis) {
    this._disabled = coerceBooleanProperty(dis);
    this.stateChanges.next();
  }
  private _disabled = false;

  @Input()
  url;

  @Input()
  valueField;

  @Input()
  displayField;

  @Input()
  delay = 500;

  @Input()
  get required() {
    return this._required;
  }
  set required(req) {
    this._required = coerceBooleanProperty(req);
    this.stateChanges.next();
  }
  private _required = false;

  get empty() {
    return !this.value;
  }

  propagateState: (val) => any;

  control = new FormControl('');
  options: { valueField: string; displayField: string }[];
  optionsMap: Map<number, string> = new Map();

  constructor(
    private http: HttpClient,
    private fm: FocusMonitor,
    private elRef: ElementRef,
    @Optional()
    @Self()
    public ngControl: NgControl
  ) {
    if (ngControl != null) {
      // Setting the value accessor directly (instead of using
      // the providers) to avoid running into a circular import.
      ngControl.valueAccessor = this;
    }
  }

  ngOnDestroy() {
    this.stateChanges.complete();
    this.fm.stopMonitoring(this.elRef.nativeElement);
  }

  ngOnInit() {
    this.fm.monitor(this.elRef.nativeElement, true).subscribe(origin => {
      this.focused = !!origin;
      this.stateChanges.next();
    });

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
