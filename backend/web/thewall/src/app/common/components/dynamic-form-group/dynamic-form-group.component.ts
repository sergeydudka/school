import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import {
  FormGroup,
  FormBuilder,
  Validators,
  FormControl
} from '@angular/forms';

import { FieldBase } from '../../models/fields/field-base.model';
import { FormService } from '../../services/form.service';

@Component({
  selector: 'dynamic-form-group',
  templateUrl: './dynamic-form-group.component.html'
})
export class DynamicFormGroupComponent implements OnInit {
  @Input()
  fields: FieldBase<any>[] = [];

  @Input()
  formGroup: FormGroup;

  constructor(private fb: FormBuilder, private formService: FormService) {}

  ngOnInit() {
    this.fields.forEach(field => {
      const validators = this.formService.formatValidators(field.validators);

      const control = new FormControl(
        field.value || field.defaultValue,
        validators
      );

      this.formGroup.addControl(field.name, control);
    });
  }
}
