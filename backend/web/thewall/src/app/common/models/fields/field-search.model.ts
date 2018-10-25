import { FieldList, FieldListProps } from './field-list.model';

export interface FieldSearchProps extends FieldListProps {
  queryKey?: string;
  url: string;
}

export class FieldSearch extends FieldList implements FieldSearchProps {
  type = 'search';
  queryKey = 'q';
  url;

  constructor(options: FieldSearchProps) {
    super(options);

    this.url = options.url;

    if (options.queryKey) {
      this.queryKey = options.queryKey;
    }
  }
}
