import { Injectable } from '@angular/core';

import { AbstractControl, FormGroup, Validators, Form } from '@angular/forms';

import { FieldText } from '../models/field-text.model';
import { FieldNumber } from '../models/field-number.model';
import { FieldBase, FieldBaseProps } from '../models/field-base.model';
import { FieldList } from '../models/field-list.model';
import { FieldDate } from '../models/field-date.model';
import { FieldHidden } from '../models/field-hidden.model';

@Injectable({
  providedIn: 'root'
})
export class FormService {
  constructor() {}

  /**
   * Creates field objects to be used in dynamic form
   *
   * @param data Fields config recieved from serve
   */
  generateFormData(data) {
    return this._createFields(data.fields, data.result.list);
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
    const methodName = fieldParams.type.toLowerCase() + 'Field';

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
      required: !fieldParams.allowNull,
      validators: []
    };

    return baseParams;
  }

  private integerField(fieldParams, fieldValue) {
    return new FieldNumber({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }

  private textField(fieldParams, fieldValue) {
    return new FieldText({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }

  private stringField(fieldParams, fieldValue) {
    return new FieldText({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }

  private listField(fieldParams, fieldValue) {
    return new FieldList({
      ...this.getBaseParams(fieldParams, fieldValue),
      options: fieldParams.options
    });
  }

  private timestampField(fieldParams, fieldValue) {
    return new FieldDate({
      ...this.getBaseParams(fieldParams, fieldValue)
    });
  }
}
