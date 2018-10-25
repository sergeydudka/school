import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

import { FieldBase } from '../../models/fields/field-base.model';

@Component({
  selector: 'sch-dynamic-form',
  templateUrl: './dynamic-form.component.html',
  styleUrls: ['./dynamic-form.component.css']
})
export class DynamicFormComponent implements OnInit {
  @Input()
  fields: FieldBase<any>[] = [];

  @Output()
  formSubmit = new EventEmitter<FormGroup>();

  @Output()
  close = new EventEmitter();

  form: FormGroup;

  constructor(private fb: FormBuilder) {}

  ngOnInit() {
    const fields = {};

    this.fields.forEach(field => {
      let validators = this.formatValidators(field.validators);

      fields[field.name] = [field.value || field.defaultValue, validators];
    });

    this.form = this.fb.group(fields);
  }

  formatValidators(validators) {
    return validators.map(validator => {
      let validatorFn;

      switch (validator) {
        default:
          validatorFn = Validators.required;
      }

      return validatorFn;
    });
  }

  onSubmit() {
    this.formSubmit.emit(this.form);
  }

  onCancelClick() {
    this.close.emit();
  }
}
