import { ColumnBase, ColumnBaseProps } from './column-base.model';
import { ColumnString, ColumnStringProps } from './column-string.model';
import { ColumnInteger, ColumnIntegerProps } from './column-integer.model';
import { ColumnList, ColumnListProps } from './column-list.model';
import { ColumnSearch, ColumnSearchProps } from './column-search.model';

export type Column = ColumnBase | ColumnString | ColumnInteger | ColumnList | ColumnSearch;
export type ColumnProps = ColumnBaseProps | ColumnStringProps | ColumnIntegerProps | ColumnListProps | ColumnSearchProps;

export {
  ColumnBase,
  ColumnInteger,
  ColumnList,
  ColumnSearch,
  ColumnString,

  ColumnBaseProps,
  ColumnIntegerProps,
  ColumnListProps,
  ColumnSearchProps,
  ColumnStringProps,
};
