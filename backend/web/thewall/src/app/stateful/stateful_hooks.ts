import { Subject } from 'rxjs';

export interface Params {
  [key: string]: any;
}

export interface CalculatedState {
  type: string;
  value: any;
}

export interface Stateful {
  /**
   * Special Subject to signalize that component state has changed
   *
   * @usageNotes
   * stateChanged$ automatically added to list of stateTriggers, don't add it there
   *
   * @important
   * make sure this subject comes before any stateful properties
   */
  stateChanged$: Subject<void | string>;

  /**
   * Calback which called after state successfully restored
   */
  stateRestored?: () => void;

  /**
   * User defined method to return unique stateKey for this component.
   * By default class constructor name is used
   */
  calculateStateKey?: () => string;

  /**
   * Holds last saved state
   */
  __state?: Params;
}

export enum ArrayStateCheckMethod {
  Length = 'length',
  Strict = 'strict'
}

// Don't rely on and don't make required any properties except prop
export interface StorableStateConfig {
  /**
   * Name of property which is being calculated
   */
  prop: string;

  /**
   * Defines custom property type, which requires to implement
   * calculate[Type]State method
   */
  type?: string;

  /**
   * Defines the way Array or Set equality is checked.
   * Defaults to ArrayStateCheckMethod.Strict
   */
  arrayCheckType?: ArrayStateCheckMethod;

  /**
   * Array of properties or Function which returns array of properties
   * to extract in case when calculated state value is
   * Object, Object[] or Map<string, Object>
   */
  keys?: ((value: any) => string[]) | string[];

  /**
   * Which of key should be considere as property key.
   *
   * @usageNotes
   * Required only if value is an object or has multiple nested objects
   */
  primaryKey?: string;

  /**
   * Function that overrides default state calculation method
   */
  calculateFn?: (
    value: any,
    prop: string,
    config: StorableStateConfig,
    initialValue: any
  ) => CalculatedState;
}

export interface StatefulConfig {
  /**
   * Defines a key by which state will be stored
   */
  stateKey?: string;

  /**
   * Properties that should be stored as state
   */
  stateProperties?: (string | StorableStateConfig)[];

  /**
   * If set to true, will prevent initial state store/restore on init
   * It will be delayed until "stateChanged$" event triggered by user
   */
  asyncInitialState?: boolean;

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

  /**
   * Allow additional parameters
   */
  [key: string]: any;
}

export interface CalculateState {
  /**
   * Collects and returns component state
   * @param props properties passed by config
   * @param initialState previously stored initial state, if not set, we should calculate initial state instead of state difference
   * @param property narrow state calculation to only this property (if provided)
   */
  calculateState(
    props: (string | StorableStateConfig)[],
    initialState?: Params,
    property?: string
  ): Params;
}

export interface StoreState {
  /**
   * Stores current component state
   *
   * @param state new state
   * @param property property which state has been calculated (if partial state caclulated)
   */
  storeState(state: Params, property?: string): void;
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
  restoreState(state: Params, props: (string | StorableStateConfig)[]): void;
}

export type StatefulClass = Stateful &
  CalculateState &
  StoreState &
  RetrieveState &
  RestoreState;
