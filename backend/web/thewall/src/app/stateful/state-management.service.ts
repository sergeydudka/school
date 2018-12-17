import { Component, Injectable, isDevMode, OnInit } from '@angular/core';

import {
  StorableStateConfig,
  ArrayStateCheckMethod,
  CalculatedState,
  Params,
  StatefulClass
} from './stateful_hooks';

@Injectable({
  providedIn: 'root'
})
export class StateManagementService {
  toString = Object.prototype.toString;

  /**
   * Merges current values with previously stored state
   *
   * @param state previously stored state value
   * @param prop property name
   * @param config user defined config for this property
   * @param currentValue current property value
   */
  restore(
    state: CalculatedState,
    prop: string,
    config: StorableStateConfig,
    currentValue: any
  ): any {
    return this.restoreStateByType(
      state.value,
      state.type,
      prop,
      config,
      currentValue
    );
  }

  restoreState(
    ctor: Function,
    cmp: Component & StatefulClass,
    state: { [key: string]: CalculatedState },
    initialState: Params,
    props: (string | StorableStateConfig)[]
  ) {
    props.forEach(params => {
      const prop = typeof params === 'string' ? params : params.prop;

      const proto: StatefulClass & OnInit = ctor.prototype;

      if (!state[prop] || !this.getClassProperty(cmp, prop)) return;

      const config = typeof params !== 'string' ? params : null;

      const propCapitalized = prop.charAt(0).toUpperCase() + prop.substr(1);
      const restoreStateMethod = proto[`set${propCapitalized}State`];
      const hasMethod =
        restoreStateMethod && typeof restoreStateMethod === 'function';

      const valAfterRestore = hasMethod
        ? restoreStateMethod.call(cmp, state[prop])
        : this.restore(state[prop], prop, config, initialState[prop].value);

      cmp[prop] = valAfterRestore;
    });
  }

  calculateState(
    ctor: Function,
    cmp: Component & StatefulClass,
    props: (string | StorableStateConfig)[],
    initialState?: Params
  ): Params {
    let hasState = false;

    const proto: StatefulClass & OnInit = ctor.prototype;

    const state = props.reduce((acc, params) => {
      const prop = typeof params === 'string' ? params : params.prop;

      if (!this.getClassProperty(cmp, prop)) return acc;

      const config = typeof params !== 'string' ? params : null;

      const propCapitalized = prop.charAt(0).toUpperCase() + prop.substr(1);
      const calculateStateMethod = proto[`get${propCapitalized}State`];
      const hasMethod =
        calculateStateMethod && typeof calculateStateMethod === 'function';

      const state = hasMethod
        ? calculateStateMethod.call(cmp)
        : this.calculate(
            cmp[prop],
            prop,
            config,
            initialState ? initialState[prop] : undefined
          );

      // don't store empty values
      if (state !== undefined) {
        hasState = true;
        acc[prop] = state;
      }

      return acc;
    }, {});

    if (!hasState) return;

    return state;
  }

  /**
   * Calculates and returns difference in intiial and current state
   *
   * @param value current property value
   * @param prop property name
   * @param config user defined config for this property
   * @param initialValue initial value to compare state to
   */
  protected calculate(
    value: any,
    prop: string,
    config: StorableStateConfig,
    initialValue?: any
  ): CalculatedState {
    const calculatedValue = this.calculateValueByType(
      value,
      prop,
      config,
      initialValue
    );

    return calculatedValue;
  }

  protected calculateValueByType(
    value: any,
    prop: string,
    config: StorableStateConfig,
    initialValue: any
  ): CalculatedState {
    let calculatedValue;

    if (
      config &&
      config.calculateFn &&
      typeof config.calculateFn === 'function'
    ) {
      calculatedValue = config.calculateFn(value, prop, config, initialValue);
    } else {
      const type =
        config && config.type ? config.type : this.getValueType(value, config);

      const funcName = `${type}StateCalculator`;

      if (!this[funcName] || typeof this[funcName] !== 'function') {
        throw new Error(`No calculate function provided for type "${type}"`);
      }

      calculatedValue = this[funcName](
        value,
        prop,
        config,
        initialValue ? initialValue.value : undefined
      );
    }

    return calculatedValue;
  }

  protected restoreStateByType(
    stateValue: any,
    type: string,
    prop: string,
    config: StorableStateConfig,
    currentValue: any
  ) {
    const funcName = `${type}StateRestorer`;

    if (!this[funcName] || typeof this[funcName] !== 'function') {
      throw new Error(`No restore function provided for type "${type}"`);
    }

    return this[funcName](stateValue, prop, config, currentValue);
  }

  /**
   * Determine value type so we know how to handle it
   *
   * @param value what to check
   * @param config user passed config
   */
  protected getValueType(value: any, config: StorableStateConfig): string {
    const type = typeof value;
    const typeToString = this.toString.call(value);

    if (['string', 'number'].includes(type)) {
      return type;
    } else if (value instanceof Date) {
      return 'date';
    } else if (typeToString === '[object Array]') {
      // check for array of objects, we process this type by default
      if (value.length && this.toString.call(value[0]) === '[object Object]') {
        return 'objectsArray';
      }

      return 'array';
    } else if (typeToString === '[object Object]') {
      return 'object';
    } else if (typeToString === '[object Map]') {
      return 'map';
    } else if (typeToString === '[object Set]') {
      return 'set';
    }

    throw new Error(
      `Cannot determine value type for property "${config}" with value "${value}"`
    );
  }

  /* ---------------STORE------------------ */

  protected booleanStateCalculator(
    value: boolean,
    prop: string,
    config: StorableStateConfig,
    initialValue: boolean
  ): { type: string; value: boolean } | void {
    // skip if value didn't change
    if (initialValue && !!initialValue == !!value) return;

    return {
      type: 'boolean',
      value
    };
  }

  protected numberStateCalculator(
    value: number,
    prop: string,
    config: StorableStateConfig,
    initialValue: number
  ): { type: string; value: number } | void {
    // skip if value didn't change
    if (initialValue && initialValue === value) return;

    return {
      type: 'number',
      value
    };
  }

  protected stringStateCalculator(
    value: string,
    prop: string,
    config: StorableStateConfig,
    initialValue: string
  ): { type: string; value: string } {
    // skip if value didn't change
    if (initialValue && initialValue === value) return;

    return {
      type: 'string',
      value
    };
  }

  protected dateStateCalculator(
    value: Date,
    prop: string,
    config: StorableStateConfig,
    initialValue: Date
  ): { type: string; value: Date } {
    // skip if value didn't change
    if (initialValue && initialValue === value) return;

    return {
      type: 'date',
      value
    };
  }

  protected objectStateCalculator(
    value: Params,
    prop: string,
    config: StorableStateConfig,
    initialValue: Params
  ): { type: string; value: Params } {
    if (!initialValue) {
      return {
        type: 'object',
        value: this.deepCopy(value)
      };
    }

    const keys = this.getExtractKeys(config, value);

    const result = {};
    let hasResult = false;

    for (const key in initialValue) {
      const val = value[key];
      const intialVal = initialValue[key];

      if (!value.hasOwnProperty(key) || val === intialVal) continue;

      // store only values specified in keys config
      if (keys.length && !keys.includes(key)) continue;

      hasResult = true;

      result[key] = val;
    }

    if (!hasResult) return;

    return {
      type: 'object',
      value: result
    };
  }

  protected arrayStateCalculator(
    value: any[],
    prop: string,
    config: StorableStateConfig,
    initialValue: any[]
  ): { type: string; value: any[] } {
    if (!initialValue) {
      return {
        type: 'array',
        value: this.deepCopy(value)
      };
    }

    let result;

    const checkType = config
      ? config.arrayCheckType
      : ArrayStateCheckMethod.Strict;

    switch (checkType) {
      case ArrayStateCheckMethod.Length:
        result = value.length === initialValue.length ? undefined : value;
        break;
      case ArrayStateCheckMethod.Strict:
      default:
        result = this.arrayEquals(value, initialValue) ? undefined : value;
    }

    // skip if value didn't change
    if (!result) return;

    return {
      type: 'array',
      value: result
    };
  }

  protected objectsArrayStateCalculator(
    value: { [key: string]: any }[],
    prop: string,
    config: StorableStateConfig,
    initialValue: Params
  ): CalculatedState | void {
    if (!initialValue) {
      return {
        type: 'objectArray',
        value: value.map(item => this.cloneObject(item))
      };
    }
    const keys = this.getExtractKeys(config, value);

    // if user didn't specified which keys to use
    // there is no easy way to determine what should be considered as state
    // because object can have complex nested structure
    // it's better to use config.calculateFn to define custom state calculator
    if (!keys.length) {
      return {
        type: 'objectsArray',
        value
      };
    }

    const initialValueMap = new Map();
    const uniqueKey = this.getUniqueKey(config, prop);

    initialValue.forEach(item => {
      initialValueMap.set(item[uniqueKey], item);
    });

    let hasDiff = false;

    const result = {};

    value.forEach(item => {
      const oldVal = initialValueMap.get(item[uniqueKey]);
      let hasDiffIem = false;

      const val = keys.reduce((acc, key) => {
        const result = item[key];

        // skip values that are not set or didn't changed
        if (result === undefined || result === oldVal[key]) {
          return acc;
        }

        hasDiffIem = true;
        acc[key] = result;
        return acc;
      }, {});

      // skip items that don't have any changed values
      if (!hasDiffIem) return;

      hasDiff = true;

      result[item[uniqueKey]] = val;
    });

    // skip if value didn't change
    if (!hasDiff) return;

    return {
      type: 'objectsArray',
      value: result
    };
  }

  protected mapStateCalculator(
    value: Map<any, any>,
    prop: string,
    config: StorableStateConfig,
    initialValue: Map<any, any>
  ) {
    if (!initialValue) {
      return {
        type: 'map',
        value: this.deepCopy([...value])
      };
    }

    const result = new Map();

    initialValue.forEach((val, key, map) => {
      // only store new state values if they present in intialState
      // and their value has changed
      if (!value.has(key) || val.get(key) === val) return;

      result.set(key, val);
    });

    if (result.size) return;

    return {
      type: 'map',
      value: [...result]
    };
  }

  protected setStateCalculator(
    value: Set<any>,
    prop: string,
    config: StorableStateConfig,
    initialValue: Set<any>
  ) {
    if (!initialValue) {
      return {
        type: 'set',
        value: this.deepCopy([...value])
      };
    }

    let result: Set<any>;

    const checkType = config
      ? config.arrayCheckType
      : ArrayStateCheckMethod.Strict;

    switch (checkType) {
      case ArrayStateCheckMethod.Length:
        result = value.size === initialValue.size ? undefined : value;
        break;
      case ArrayStateCheckMethod.Strict:
      default:
        result = this.arrayEquals([...value], [...initialValue])
          ? undefined
          : value;
    }

    // skip if value didn't change
    if (!result) return;

    return {
      type: 'set',
      value: result
    };
  }

  /* ---------------RESTORE------------------ */

  protected booleanStateRestorer(
    stateValue,
    prop,
    config,
    currentValue
  ): boolean {
    return stateValue;
  }

  protected numberStateRestorer(
    stateValue,
    prop,
    config,
    currentValue
  ): number {
    return stateValue;
  }

  protected stringStateRestorer(
    stateValue,
    prop,
    config,
    currentValue
  ): string {
    return stateValue;
  }

  protected dateStateRestorer(stateValue, prop, config, currentValue): Date {
    return stateValue;
  }

  protected objectStateRestorer(
    stateValue,
    prop,
    config,
    currentValue
  ): Params {
    return Object.assign({}, currentValue, stateValue);
  }

  protected arrayStateRestorer(stateValue, prop, config, currentValue): any[] {
    return stateValue;
  }

  protected objectsArrayStateRestorer(
    stateValue: Params,
    prop: string,
    config: StorableStateConfig,
    currentValue: Params[]
  ) {
    const uniqueKey = this.getUniqueKey(config, prop);

    return currentValue.map(curVal => {
      const val = stateValue[curVal[uniqueKey]];

      return Object.assign({}, curVal, val);
    });
  }

  protected mapStateRestorer(
    stateValue: any[],
    prop: string,
    config: StorableStateConfig,
    currentValue: Map<any, any>
  ): Map<any, any> {
    const uniqueKey = this.getUniqueKey(config, prop);

    const stateValueMap = new Map(stateValue);
    const newVal = new Map();

    currentValue.forEach((val, key, map) => {
      newVal.set(key, stateValueMap.has(key) ? stateValueMap.get(key) : val);
    });

    return newVal;
  }

  protected setStateRestorer(stateValue, prop, config, currentValue): Set<any> {
    return stateValue;
  }

  /* ---------------HELPERS------------------ */

  /**
   * Helper method to check whether arrays are the same
   */
  arrayEquals(arr1, arr2) {
    const len = arr1.length;

    for (let i = 0; i < len; ++i) {
      if (arr1[i] !== arr2[i]) {
        return false;
      }
    }

    return true;
  }

  /**
   * Retures set of keys to extract from object
   * @param config user provided config
   */
  getExtractKeys(config: StorableStateConfig, value: any): string[] {
    let result: string[] = [];

    if (config && config.keys) {
      if (typeof config.keys === 'function') {
        result = config.keys(value);
      } else {
        result = config.keys;
      }
    }

    return result;
  }

  /**
   * Create a deep copy of any valid JSON structure
   * @param val value to process
   */
  deepCopy(val: any): any {
    return JSON.parse(JSON.stringify(val));
  }

  cloneObject(obj) {
    const clone = {};
    for (const i in obj) {
      if (obj[i] != null && this.toString.call(obj[i]) == '[object Object]') {
        clone[i] = this.cloneObject(obj[i]);
      } else clone[i] = obj[i];
    }
    return clone;
  }

  getUniqueKey(config: StorableStateConfig, prop: string): string {
    let primaryKey: string;

    if (config && config.primaryKey) {
      primaryKey = config.primaryKey;
    } else {
      throw new Error(
        `"primaryKey" config is required but not specified for property "${prop}"`
      );
    }

    return primaryKey;
  }

  /**
   * Checks whether class has this property
   *
   * @param cmp component to take values from
   * @param prop property to check
   * @param searchInPrototype whether we should search down on prototype chaing or not
   */
  getClassProperty(cmp, prop: string, searchInPrototype?: boolean): boolean {
    const result = searchInPrototype ? cmp[prop] : cmp.hasOwnProperty(prop);

    if (!result && isDevMode()) {
      console.warn(
        `Compoent "${cmp.constructor.name}" doesn't have ${
          searchInPrototype ? '' : 'own'
        } property "${prop}"`
      );
    }

    return result;
  }
}
