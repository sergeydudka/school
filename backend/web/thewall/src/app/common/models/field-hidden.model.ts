import { FieldBase, FieldBaseProps } from "./field-base.model";

export interface FieldHiddenProps extends FieldBaseProps<string> {}

export class FieldHidden extends FieldBase<string> {
  type = "hidden";

  constructor(options: FieldHiddenProps) {
    super(options);
  }
}
