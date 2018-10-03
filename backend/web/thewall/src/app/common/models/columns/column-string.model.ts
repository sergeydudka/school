import { ColumnBase, ColumnBaseProps } from './column-base.model';

export interface ColumnStringProps extends ColumnBaseProps {}

export class ColumnString extends ColumnBase implements ColumnStringProps {
  constructor(options: ColumnStringProps) {
    super(options);
  }
}
