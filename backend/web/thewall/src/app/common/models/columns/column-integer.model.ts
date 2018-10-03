import { ColumnBase, ColumnBaseProps } from './column-base.model';

export interface ColumnIntegerProps extends ColumnBaseProps {}

export class ColumnInteger extends ColumnBase implements ColumnIntegerProps {
  constructor(options: ColumnIntegerProps) {
    super(options);
  }
}
