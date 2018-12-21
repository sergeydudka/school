import { Injectable, OnInit } from '@angular/core';
import { Subject } from 'rxjs';

export interface EntityStateChanges {
  /**
   * Name of entity that being changed
   */
  type: string;

  /**
   * Action that is taken upon entity
   */
  action: 'create' | 'update' | 'delete';

  /**
   * Reference to entity
   */
  reference?: any;
}

@Injectable({
  providedIn: 'root'
})
export class GlobalEventsService {
  entityChanged$: Subject<EntityStateChanges> = new Subject();
}
