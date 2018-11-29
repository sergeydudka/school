import { FieldBase, FieldBaseProps } from './field-base.model';

export interface FieldTextAreaProps extends FieldBaseProps<string> {}

export class FieldTextArea extends FieldBase<string> {
  type = 'textarea';

  constructor(options: FieldTextAreaProps) {
    super(options);
  }
}
