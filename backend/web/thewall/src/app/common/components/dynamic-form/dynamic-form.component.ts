import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

import { FieldBase } from '../../models/fields/field-base.model';
import { FormService } from '../../services/form.service';

@Component({
  selector: 'sch-dynamic-form',
  templateUrl: './dynamic-form.component.html',
  styleUrls: ['./dynamic-form.component.scss']
})
export class DynamicFormComponent implements OnInit {
  @Input()
  fields: FieldBase<any>[] = [];

  @Output()
  formSubmit = new EventEmitter<FormGroup>();

  @Output()
  close = new EventEmitter();

  form: FormGroup;

  constructor(private fb: FormBuilder, private formsService: FormService) {}

  ngOnInit() {
    const fields = {};

    this.fields.forEach(field => {
      let validators = this.formsService.formatValidators(field.validators);

      fields[field.name] = [field.value || field.defaultValue, validators];
    });

    this.form = this.fb.group(fields);
  }

  onSubmit() {
    if (this.form.invalid) {
      this.formsService.showErrors(this.form);
      return;
    }

    this.formSubmit.emit(this.form);
  }

  onCancelClick() {
    this.close.emit();
  }
}
