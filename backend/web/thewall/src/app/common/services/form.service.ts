import { Injectable } from '@angular/core';

import { AbstractControl, FormGroup, Validators, Form } from '@angular/forms';

// TODO: langs and move this to some kind of service
const validationMessages = {
  required: 'Field cannot be empty',
  email: 'Please enter valid email address',
  matDatepickerParse: 'Please enter valid date in format Y-m-d H:i:s' // TODO: take date format from config
};

import {
  FieldText,
  FieldTextArea,
  FieldNumber,
  FieldBase,
  FieldBaseProps,
  FieldList,
  FieldDate,
  FieldHidden,
  FieldSearch
} from '../models/fields/fields.model';
import { ApiService } from './api.service';
import { NormalizeFieldsService } from './yii/normalize-fields.service';
import { NotificationsService } from 'angular2-notifications';

@Injectable({
  providedIn: 'root'
})
export class FormService {
  constructor(
    private api: ApiService,
    private normalizeFieldsService: NormalizeFieldsService,
    private notificationsService: NotificationsService
  ) {}

  /**
   * Creates field objects to be used in dynamic form
   *
   * @param data Fields config recieved from serve
   */
  generateFields(data) {
    const normalizedFields = this.normalizeFieldsService.normalize(data.fields);

    return this._createFields(normalizedFields, data.result.list);
  }

  getChanges(form: FormGroup): Object {
    return this.getFieldValues(this.getChangedFields(form));
  }

  /**
   * Find form group controls that have chaged
   *
   * @param form From group control form which fields should be extracted
   */
  getChangedFields(form: FormGroup): { [key: string]: AbstractControl } {
    const result = {};

    for (let key in form.controls) {
      const control = form.controls[key];

      if (!control.dirty) continue;

      result[key] = control;
    }

    return result;
  }

  /**
   * Returns values of passed fields
   *
   * @param fields collection of fields to get information from
   */
  getFieldValues(fields: { [key: string]: AbstractControl }): {} {
    const values = {};

    for (let key in fields) {
      values[key] = fields[key].value;
    }

    return values;
  }

  /**
   * Returns list of errors for each field
   * Native FormGropup erorrs is broken :(
   *
   * @param form target control
   */
  getErrors(form: FormGroup): { [key: string]: any } {
    const errors = {};

    for (const name in form.controls) {
      const control = form.controls[name];

      if (control.valid) continue;

      errors[name] = control.errors;
    }

    return errors;
  }

  /**
   * Returns formatter error messages
   *
   * @param form target control
   */
  getErrorMessage(form: FormGroup): string {
    const messages = [];

    const errorFields = this.getErrors(form);

    for (const name in errorFields) {
      const errors = errorFields[name];

      messages.push(`<b>${name}:</b>`);
      for (const errorType in errors) {
        messages.push(`<div style="padding-left: 15px;">- ${validationMessages[errorType]}</div>`);
      }
    }

    return messages.join('');
  }

  /**
   * Displays error message for passed control
   *
   * @param form target control
   */
  showErrors(form: FormGroup): void {
    const msg = this.getErrorMessage(form);

    // TODO: langs
    this.notificationsService.error(`Form invalid`, msg);
  }

  /**
   * Creates Angular validators from array of validators options
   *
   * @param validators validators options
   */
  formatValidators(validators: any[]) {
    return validators.map(validator => {
      let validatorFn;

      switch (validator.type) {
        case 'minlength':
          validatorFn = Validators.minLength(validator.value);
          break;
        case 'maxlength':
          validatorFn = Validators.maxLength(validator.value);
          break;
        default:
          validatorFn = validator.value ? Validators[validator.type](validator.value) : Validators[validator.type];
      }

      return validatorFn;
    });
  }

  /**
   * Creates fields objects based on parameters
   *
   * @param params fields configuration
   * @param values fields values
   */
  private _createFields(params, values) {
    const fields: FieldBase<any>[] = [];

    for (let i in params) {
      let field = params[i];

      if (field.isPrimaryKey || !field.display) continue;

      fields.push(this._createField(params[i], values[i]));
    }

    return fields;
  }

  /**
   * Creates single field object based on parameters
   *
   * @param fieldParams field configurations
   * @param fieldValue field value
   */
  private _createField(fieldParams, fieldValue) {
    const methodName = `_${fieldParams.type.toLowerCase()}Field`;

    if (!this[methodName]) throw new Error(`No constructor provided for "${methodName}"`);

    return this[methodName](fieldParams, fieldValue);
  }

  private getBaseParams(fieldParams, fieldValue) {
    const baseParams: FieldBaseProps<any> = {
      value: fieldValue,
      name: fieldParams.name,
      type: fieldParams.type,
      label: fieldParams.label,
      defaultValue: fieldParams.defaultValue,
      required: fieldParams.required,
      validators: fieldParams.validators
    };

    return baseParams;
  }

  private _numberField(fieldParams, fieldValue) {
    return new FieldNumber({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }

  private _textField(fieldParams, fieldValue) {
    return new FieldTextArea({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }

  private _stringField(fieldParams, fieldValue) {
    return new FieldText({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }

  private _listField(fieldParams, fieldValue) {
    return new FieldList({
      ...this.getBaseParams(fieldParams, fieldValue),
      options: fieldParams.options
    });
  }

  private _dateField(fieldParams, fieldValue) {
    return new FieldDate({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }

  private _searchField(fieldParams, fieldValue) {
    return new FieldSearch({
      ...this.getBaseParams(fieldParams, fieldValue),
      valueField: fieldParams.rel.field,
      displayField: fieldParams.rel.label,
      url: this.api.getApiById(fieldParams.rel.field)
    });
  }
}
