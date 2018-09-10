import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class GridBuilderService {
  constructor() { }

  getColumns(data) {
    const columns = [];

    const { fields: cols } = data;

    for (var i in cols) {
      if (i === 'description') continue;

      const col = cols[i],
        colsParams: {
          [name: string]: any
        } = {
          name: col.name,
          label: col.label,
          type: col.type,
        };

      if (col.type === 'list') {
        // TODO: transformation to array on server side
        let temp = [];

        for (let i in col.options) {
          temp.push({
            key: i,
            value: col.options[i],
          });
        }

        colsParams.options = temp;
      }

      columns.push(colsParams);
    }

    return columns;
  }
}
