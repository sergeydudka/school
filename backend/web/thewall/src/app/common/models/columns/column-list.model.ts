import { ColumnBase, ColumnBaseProps } from './column-base.model';

export interface ColumnListProps extends ColumnBaseProps {
  valueField: string;
  displayField: string;
}

export class ColumnList extends ColumnBase implements ColumnListProps {
  valueField;
  displayField;

  constructor(options: ColumnListProps) {
    super(options);

    this.valueField = options.valueField;
    this.displayField = options.displayField;
  }
}
