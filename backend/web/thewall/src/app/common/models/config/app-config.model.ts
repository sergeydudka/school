import { Edition } from './edition.model';
import { Action } from './action.model';
import { Pagination } from './pagination.model';

export interface AppConfig {
  /** Base URL for API requests */
  baseUrl: string;

  /** URL for getting application API */
  apiUrl: string;

  adminEmail: string;
  supportEmail: string;
  loginUrl: string;
  logoutUrl: string;
  edition: Edition;
  adminUserGroup: number;
  pagination: Pagination;
  action: Action;
}
