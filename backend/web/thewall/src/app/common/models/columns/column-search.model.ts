import { ColumnList, ColumnListProps } from './column-list.model';

export interface ColumnSearchProps extends ColumnListProps {
  queryKey?: string;
  url: string;
}

export class ColumnSearch extends ColumnList implements ColumnSearchProps {
  queryKey = 'q';
  url;

  constructor(options: ColumnSearchProps) {
    super(options);

    this.url = options.url;

    if (options.queryKey) {
      this.queryKey = options.queryKey;
    }
  }
}
