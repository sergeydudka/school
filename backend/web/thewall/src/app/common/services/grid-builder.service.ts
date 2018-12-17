import { Injectable } from '@angular/core';

import {
  Column,
  ColumnBase,
  ColumnInteger,
  ColumnSearch,
  ColumnList,
  ColumnProps
} from '../models/columns/columns.model';

import { ApiService } from './api.service';
import { FormService } from './form.service';
import { NormalizeFieldsService } from './yii/normalize-fields.service';

@Injectable({
  providedIn: 'root'
})
export class GridBuilderService {
  constructor(
    private api: ApiService,
    private normalizeFieldsService: NormalizeFieldsService,
    private formService: FormService
  ) {}

  generateColumnsData(data) {
    const normalizedFields = this.normalizeFieldsService.normalize(data.fields);

    return this._createColumns(normalizedFields);
  }

  /**
   *
   * @param cols array of column configs
   */
  private _createColumns(cols: {}) {
    const columns: ColumnProps[] = [];

    for (let i in cols) {
      const col = cols[i];

      if (!col.display) continue;

      columns.push(this._createColumn(cols[i]));
    }

    return columns;
  }

  /**
   * Creates column based on provided config
   *
   * @param col column config
   */
  private _createColumn(col) {
    const methodName = `_${col.type.toLowerCase()}Column`;

    if (!this[methodName]) {
      throw new Error(`No constructor provided for "${methodName}"`);
    }

    return this[methodName](col);
  }

  private _getBaseParams(col) {
    const baseParams: ColumnProps = {
      label: col.label,
      name: col.name,
      type: col.type,
      order: col.order,
      validators: col.validators,
      hidden: false,
      filterValidators: this.formService.formatValidators(
        (col.validators || []).filter(
          validator => validator.type !== 'required'
        )
      )
    };

    return baseParams;
  }

  private _numberColumn(col) {
    return new ColumnInteger({
      ...this._getBaseParams(col)
    });
  }

  private _stringColumn(col) {
    return new ColumnInteger({
      ...this._getBaseParams(col)
    });
  }

  private _textColumn(col) {
    return new ColumnInteger({
      ...this._getBaseParams(col)
    });
  }

  private _dateColumn(col) {
    return new ColumnInteger({
      ...this._getBaseParams(col)
    });
  }

  private _listColumn(col) {
    return new ColumnList({
      ...this._getBaseParams(col),
      valueField: col.rel.field,
      displayField: col.rel.label
    });
  }

  private _searchColumn(col) {
    return new ColumnSearch({
      ...this._getBaseParams(col),
      valueField: col.rel.field,
      displayField: col.rel.label,
      url: this.api.getApiById(col.rel.field)
    });
  }
}
