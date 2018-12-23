import { ElementRef } from '@angular/core';

export abstract class CrudBaseService {
  protected idProperty: string;
  protected entity: string;
  protected target: ElementRef;

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

  setApi(api: {}) {
    this.api = api;
    return this;
  }

  setIdProperty(idProperty: string) {
    this.idProperty = idProperty;
    return this;
  }

  setEntity(entity: string) {
    this.entity = entity;
    return this;
  }

  setTarget(element: ElementRef) {
    this.target = element;
    return this;
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
