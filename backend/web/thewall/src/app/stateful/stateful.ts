import 'reflect-metadata';

import { isDevMode, OnInit, Component } from '@angular/core';

import { combineLatest, of as observableOf, Subject } from 'rxjs';
import { switchMap, debounceTime, take, tap } from 'rxjs/operators';

import { AppInjector } from '../app.injector';
import { StatefulService } from './stateful.service';
import {
  StatefulConfig,
  Params,
  StatefulClass,
  StorableStateConfig,
  CalculatedState
} from './stateful_hooks';
import { StateManagementService } from './state-management.service';

export function MakeStateful(stateParams: StatefulConfig = {}): ClassDecorator {
  const statefulPropertyKey = 'stateful-property';

  return function(ctor: Function, ...args) {
    // TODO: use those values somehow
    const meta = Reflect.getOwnMetadata(statefulPropertyKey, ctor.prototype);

    stateParams.stateProperties = [
      ...(Array.isArray(meta) ? meta : []),
      ...(Array.isArray(stateParams.stateProperties)
        ? stateParams.stateProperties
        : [])
    ];

    if (!stateParams.stateProperties.length) return;

    stateParams.stateTriggers = stateParams.stateTriggers || [];
    if (isDevMode() && stateParams.stateTriggers.includes('stateChanged$')) {
      throw new Error(
        `Subject "stateChanged$" shouldn't be included in list of stateTriggers, it's added automatically`
      );
    }

    const stateConfig: StatefulConfig = {
      delay: 1000,
      stateKey: ctor.name,
      ...stateParams,
      // we need stateChanged$ event on the first place
      stateTriggers: ['stateChanged$', ...stateParams.stateTriggers]
    };

    let initialState: Params = null;

    const proto: StatefulClass & OnInit = ctor.prototype;

    // reference to component instance
    let cmp: Component & StatefulClass;

    // store reference to application vide state service
    let statefulService: StatefulService;

    // store reference to application vide state calculation service
    let stateManagementService: StateManagementService;

    const onInit = proto.ngOnInit;
    proto.ngOnInit = function(...args) {
      cmp = this;

      onInit && onInit.apply(this, args);

      init();
    };

    /**
     * Initializes decorator when component ready
     */
    function init() {
      cmp.__state = {};

      if (!isValid()) return;

      if (
        cmp.calculateStateKey &&
        typeof cmp.calculateStateKey === 'function'
      ) {
        stateConfig.stateKey = cmp.calculateStateKey();
      }

      statefulService = AppInjector.get(StatefulService);
      stateManagementService = AppInjector.get(StateManagementService);

      if (!stateConfig.asyncInitialState) {
        setupInitialState();
        initStateListeners();
        triggerStateRestore();
      } else {
        // we subscribe to stateChanged$ independently to mark a point
        // where it's safe to start using/restoring state
        cmp.stateChanged$
          .pipe(
            take(1),
            tap(() => {
              setupInitialState();
              triggerStateRestore();
              initStateListeners();
            })
          )
          .subscribe();
      }
    }

    function isValid() {
      let isValid = true;

      if (!cmp.stateChanged$ || !(cmp.stateChanged$ instanceof Subject)) {
        isValid = false;
        console.warn(
          `One or more required properties is missing or have incorrect type to make class "${
            ctor.name
          }" stateful, make sure class implements "Stateful" interface`
        );
      }

      return isValid;
    }

    /**
     * Helper method to check whether it's initial state store
     *
     * @param state new state
     */
    function setupInitialState(): void {
      initialState = cmp.calculateState(stateConfig.stateProperties);
    }

    /**
     * Initializes listeners to change events passed by config
     */
    function initStateListeners() {
      if (!stateConfig.stateTriggers) return;

      // allow state triggers that are nested inside component structure
      // for example sorters.sortChanged
      const observers = stateConfig.stateTriggers.map(key => {
        const keySplit = key.split('.');
        return keySplit.reduce((acc, val) => acc[val], cmp);
      });

      let narrowStateToProp;

      combineLatest(...observers)
        .pipe(
          debounceTime(stateConfig.delay || 1000),
          switchMap(data => {
            narrowStateToProp = data[0] as string;

            return observableOf(
              cmp.calculateState(
                stateConfig.stateProperties,
                initialState,
                // force string, since we know that first item is
                // awlays stateChanged$ observable
                narrowStateToProp
              )
            );
          })
        )
        .subscribe(data => {
          cmp.storeState(data, narrowStateToProp);
        });

      // we need to manually trigger this event first time
      // to make combineLatest work
      cmp.stateChanged$.next();
    }

    /**
     * Helper method to trigger state restore
     */
    function triggerStateRestore() {
      const state = cmp.retrieveState();

      if (!state) return;

      cmp.restoreState(state, stateConfig.stateProperties);
    }

    proto.calculateState =
      proto.calculateState ||
      function(
        props: (string | StorableStateConfig)[],
        initialState?: Params,
        property?: string
      ): Params {
        return stateManagementService.calculateState(
          ctor,
          cmp,
          props,
          initialState,
          property
        );
      };

    proto.storeState =
      proto.storeState ||
      function(state: Params, property?: string): void {
        if (stateConfig.debug) {
          console.log('storeState => ', state);
        }

        // if only single property changed
        if (property) {
          // if property state same as initial, remove it
          if (state === undefined) {
            delete cmp.__state[property];
            // otherwise update
          } else {
            cmp.__state[property] = state[property];
          }
        } else {
          cmp.__state = state || {};
        }

        const count = Object.keys(cmp.__state).length;

        if (count) {
          statefulService.set(stateConfig.stateKey, this.__state);
        } else {
          statefulService.remove(stateConfig.stateKey);
        }
      };

    proto.retrieveState =
      proto.retrieveState ||
      function(): Params {
        return statefulService.get(stateConfig.stateKey);
      };

    proto.restoreState =
      proto.restoreState ||
      function(
        state: { [key: string]: CalculatedState },
        props: (string | StorableStateConfig)[]
      ): void {
        if (stateConfig.debug) {
          console.log('restoreState => ', state);
        }

        cmp.__state = state;

        stateManagementService.restoreState(
          ctor,
          cmp,
          state,
          initialState,
          props
        );
      };
  };
}
