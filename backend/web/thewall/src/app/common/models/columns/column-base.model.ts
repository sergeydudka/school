export interface ColumnBaseProps {
  name: string;
  label: string;
  type: string;
  order: number;
  validators?: any[];
  filterValidators?: any[];
}

export class ColumnBase implements ColumnBaseProps {
  name;
  label;
  type;
  order;

  constructor(options: ColumnBaseProps) {
    for (let k in options) {
      this[k] = options[k];
    }
  }
}
