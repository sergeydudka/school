export interface ColumnBaseProps {
  name: string;
  label: string;
  type: string;
  order: number;
  validators?: any[];
  hidden?: boolean;
  filterValidators?: any[];
}

export class ColumnBase implements ColumnBaseProps {
  name;
  label;
  type;
  order;
  hidden;

  constructor(options: ColumnBaseProps) {
    for (const k in options) {
      this[k] = options[k];
    }
  }
}
