import { YIIResponse } from './yii-response.model';

export interface YIIEntityResponse extends YIIResponse {
  labels: object;
  rules;
  scenarios: any;
  result: {
    behaviours: any;
    count: number;
    list: any;
    total: number;
    model: string;
  };
}
