import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class NormalizeFieldsService {
  constructor() {}

  /**
   * Normalizes server sent config to make it easier to use with Angular
   *
   * @param fields fields to norrmalize
   */
  normalize(fields) {
    const result = {};

    for (let name in fields) {
      const field = fields[name];

      const methodName = `_${field.type}FieldNormalizer`;

      if (!this[methodName]) throw new Error(`No normalizer provided for data type "${field.type}"`);

      result[name] = this[methodName](field);
    }

    return result;
  }

  private _baseFieldNormalizer(params) {
    const result = {
      ...params,
      validators: []
    };

    if (params.required) {
      result.validators.push({
        type: 'required'
      });
    }

    return result;
  }

  private _stringFieldNormalizer(params) {
    const result = {
      ...this._baseFieldNormalizer(params)
    };

    if (params.size) {
      result.validators.push({
        type: 'maxlength',
        value: params.size
      });
    }

    if (params.name === 'email') {
      result.validators.push({
        type: 'email'
      });
    }

    return result;
  }

  private _textFieldNormalizer(params) {
    const result = {
      ...this._baseFieldNormalizer(params)
    };

    if (params.size) {
      result.validators.push({
        type: 'maxlength',
        value: params.size
      });
    }

    return result;
  }

  private _integerFieldNormalizer(params) {
    const result = {
      ...this._baseFieldNormalizer(params),
      type: 'number'
    };

    result.validators.push({
      type: 'pattern',
      value: /\d*/
    });

    if (params.size) {
      result.validators.push({
        type: 'max',
        value: +'1'.repeat(params.size) * 9
      });
    }

    return result;
  }

  private _timestampFieldNormalizer(params) {
    const result = {
      ...this._baseFieldNormalizer(params),
      type: 'date'
    };

    return result;
  }

  private _listFieldNormalizer(params) {
    const result = {
      ...this._baseFieldNormalizer(params)
    };

    return result;
  }

  private _searchFieldNormalizer(params) {
    const result = {
      ...this._baseFieldNormalizer(params)
    };

    return result;
  }
}
