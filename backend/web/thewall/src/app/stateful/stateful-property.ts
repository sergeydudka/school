import 'reflect-metadata';
import { StorableStateConfig } from './stateful_hooks';

const statefulPropertyKey = 'stateful-property';
// Not suppported in TypeScript O_O
// const statefulPropertyKey = Symbol.for('stateful-property');

/**
 * Makes property save it's state on changed via triggering `stateChanged$` subject
 * so make sure that target class has `@MakeStateful` decorator applied
 *
 * @usageNotes
 * Can be applied to property as decorator `@StatefulProperty`
 * or with config which follows `StorableStateConfig` interface with `prop` config ommited
 * it will be taken from decorated property name
 *
 * @important
 * It would only react to property on simple primitives
 * or and when reference to complex object is changed
 * so Array manipulation such as "push", "shift", etc. won't be detected
 * use `stateTriggers` of `@MakeStateful` decorator to notify about such changes
 *
 * @param targetOrConfig
 * @param property
 */
export function StatefulProperty(
  targetOrConfig: Object | StorableStateConfig,
  property?: string
): any {
  function decorate(
    target: any,
    property: string,
    config?: Partial<StorableStateConfig>
  ): void {
    let properties = [];

    if (!Reflect.hasOwnMetadata(statefulPropertyKey, target)) {
      Reflect.defineMetadata(statefulPropertyKey, properties, target);
    } else {
      properties = Reflect.getOwnMetadata(statefulPropertyKey, target);
    }

    const propertyConfig: StorableStateConfig = Object.assign(config || {}, {
      prop: property
    });

    properties.push(propertyConfig);

    let propertyValue;

    function getter() {
      return propertyValue;
    }

    function setter(val) {
      propertyValue = val;

      if (this.stateChanged$) {
        this.stateChanged$.next(property);
      } else {
        console.warn(
          `Cannot reference "stateChanged$" observable in "${
            target.constructor.name
          }" class. Please make sure it implements "Stateful" interface and "stateChanged$" property comes before any @StatefulProperty`
        );
      }
    }

    Object.defineProperty(target, property, {
      get: getter,
      set: setter,
      enumerable: true,
      configurable: true
    });
  }

  if (property === undefined) {
    return (target, prop) => decorate(target, prop, targetOrConfig);
  }

  return decorate(targetOrConfig, property);
}
