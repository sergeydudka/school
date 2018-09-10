import { FieldBase, FieldBaseProps } from './field-base.model';

export interface FieldListProps extends FieldBaseProps<string> {
  options: { key: string, value: string }[];
}

export class FieldList extends FieldBase<string> implements FieldListProps {
  type = 'list';
  options;

  constructor(options: FieldListProps) {
    super(options);

    this.options = options['options'] || {};
  }
}
