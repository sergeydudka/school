import { FieldBase, FieldBaseProps } from './field-base.model';

export interface FieldTextProps extends FieldBaseProps<string> {

}

export class FieldText extends FieldBase<string> {
  type = 'text';

  constructor(options: FieldTextProps) {
    super(options);
  }
}
