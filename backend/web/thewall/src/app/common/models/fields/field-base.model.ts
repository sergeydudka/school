export interface FieldBaseProps<T> {
  value?: T,
  name: string,
  type: string,
  label: string,
  readOnly?: boolean,
  validators?: Array<T>,
  required?: boolean,
  defaultValue?: T,
}

export class FieldBase<T> implements FieldBaseProps<T> {
  value;
  name;
  type;
  label;
  readOnly;
  validators;
  required;
  defaultValue;

  constructor(options: FieldBaseProps<T>) {
    for (let k in options) {
      this[k] = options[k];
    }
  }
}
