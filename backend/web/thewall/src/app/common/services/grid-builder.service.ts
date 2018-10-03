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

@Injectable({
  providedIn: 'root'
})
export class GridBuilderService {
  constructor(private api: ApiService) {}

  generateColumnsData(data) {
    return this._createColumns(data.fields);
  }

  /**
   *
   * @param cols array of column configs
   */
  private _createColumns(cols: {}) {
    const columns: ColumnProps[] = [];

    for (var i in cols) {
      const col = cols[i];

      if (!col.display) continue;

      if (col.type === 'integer' && col.rel) {
        col.type = 'list';
      }

      if (['alias_id'].includes(col.name)) {
        col.type = 'integer';
      }

      if (['created_at', 'updated_at'].includes(col.name)) {
        col.type = 'timestamp';
      }

      if (['title'].includes(col.name)) {
        col.type = 'string';
      }

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

    if (!this[methodName]) throw new Error(`No constructor provided for "${methodName}"`);

    return this[methodName](col);
  }

  private _getBaseParams(col) {
    const baseParams: ColumnProps = {
      label: col.label,
      name: col.name,
      type: col.type,
      order: col.order
    };

    return baseParams;
  }

  private _integerColumn(col) {
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

  private _timestampColumn(col) {
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
