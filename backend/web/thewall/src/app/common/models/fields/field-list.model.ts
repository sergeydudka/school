import { FieldBase, FieldBaseProps } from './field-base.model';

export interface FieldListProps extends FieldBaseProps<string> {
  valueField?: string;
  displayField?: string;
  options: { key: string; value: string }[];
}

export class FieldList extends FieldBase<string> implements FieldListProps {
  type = 'list';
  valueField = 'key';
  displayField = 'value';
  options;

  constructor(options: FieldListProps) {
    super(options);

    this.options = options.options || [];
    if (options.valueField) {
      this.valueField = options.valueField;
    }
    if (options.displayField) {
      this.displayField = options.displayField;
    }
  }
}
