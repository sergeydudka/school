import { Subject } from 'rxjs';

export interface Params {
  [key: string]: any;
}

export interface Stateful {
  stateChanged$: Subject<void>;

  /**
   * Holds last saved state
   */
  __state: Params;
}

export interface StatefulConfig {
  /**
   * Defines a key by which state will be stored
   */
  stateKey?: string;

  // TODO: do we need this?
  // preventRestoreOnInit?: boolean;

  /**
   * Properties that should be stored as state
   */
  stateProperties?: string[];

  /**
   * @description
   * Set of paths to Observables, which should trigger state save on change
   *
   * @example
   * ['filterRow.filtersChanges', 'sortHeader']
   */
  stateTriggers?: any[];

  /**
   * Delay before storing changed state
   *
   * defaults to 1000ms
   */
  delay?: number;

  /**
   * Show debug infromation
   */
  debug?: boolean;
}

export interface GetState {
  /**
   * Collects and returns component state
   * @param props properties passed by config
   */
  getState(props: string[]): Params;
}

export interface StoreState {
  /**
   * Stores current component state
   *
   * @param state new state
   */
  storeState(state: Params): void;
}

export interface RetrieveState {
  /**
   * Returns previously stored state
   */
  retrieveState(): Params;
}

export interface RestoreState {
  /**
   * Restores component to it's previously stored state
   */
  restoreState(state: Params): void;
}

export type StatefulClass = Stateful &
  GetState &
  StoreState &
  RetrieveState &
  RestoreState;
