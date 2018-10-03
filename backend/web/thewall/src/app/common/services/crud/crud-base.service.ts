import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';

export abstract class CrudBaseService {
  protected idProperty: string;

  protected api: {
    index?: {
      url: string;
      access: boolean;
    };
    view?: {
      url: string;
      access: boolean;
    };
    create?: {
      url: string;
      access: boolean;
    };
    update?: {
      url: string;
      access: boolean;
    };
    delete?: {
      url: string;
      access: boolean;
    };
  };

  setApi(api: {}): void {
    this.api = api;
  }

  setIdProperty(idProperty: string): void {
    this.idProperty = idProperty;
  }

  /**
   * Gets single element from server
   */
  abstract get(id: number);

  /**
   * Gets list of elements
   */
  abstract list(defaults, sorting, pager, filters);

  /**
   * Either saves or updates entity based on passed 'data'
   */
  abstract save(data);

  /**
   * Saves new entity to server
   */
  protected abstract create(data);

  /**
   * Updates existing entity on server
   */
  protected abstract update(data);

  /**
   * Removes entity on server
   */
  abstract delete(id: number);
}
