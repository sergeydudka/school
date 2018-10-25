export interface YIIResponse {
  errors: any;
  fileds: object;
  status: boolean;
  statusCode: number;
  result: {
    count: number;
    list: any;
    total: number;
    model: string;
  };
  [any: string]: any;
}
