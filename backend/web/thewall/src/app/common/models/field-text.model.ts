import { FieldBase, FieldBaseProps } from './field-base.model';

export interface FieldNumberProps extends FieldBaseProps<string> {

}

export class FieldText extends FieldBase<string> {
  type = 'text';

  constructor(options: FieldNumberProps) {
    super(options);
  }
}
