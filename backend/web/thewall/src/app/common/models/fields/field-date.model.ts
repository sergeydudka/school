import { FieldBase, FieldBaseProps } from './field-base.model';

export interface FieldDateProps extends FieldBaseProps<string> {

}

export class FieldDate extends FieldBase<string> {
  type = 'date';

  constructor(options: FieldDateProps) {
    super(options);
  }
}
