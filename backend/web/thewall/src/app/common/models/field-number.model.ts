import { FieldBase, FieldBaseProps } from './field-base.model';

export interface FieldNumberProps extends FieldBaseProps<string> {

}

export class FieldNumber extends FieldBase<string> {
  type = 'number';

  constructor(options: FieldNumberProps) {
    super(options);
  }
}
