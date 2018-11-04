import { Component, OnInit, Input } from '@angular/core';
import { FormGroup } from '@angular/forms';

import { FieldBase } from '../../models/fields/field-base.model';

@Component({
  selector: 'sch-dynamic-field',
  templateUrl: './dynamic-field.component.html',
  styleUrls: ['./dynamic-field.component.scss']
})
export class DynamicFieldComponent implements OnInit {
  @Input()
  field: FieldBase<any>;
  @Input()
  form: FormGroup;

  constructor() {}

  ngOnInit() {}
}
