import { isDevMode, OnInit, Component } from '@angular/core';

import { combineLatest, of as observableOf } from 'rxjs';
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
  return function(ctor: Function) {
    if (isDevMode() && stateParams.stateTriggers.includes('stateChanged$')) {
      throw new Error(
        `Subject "stateChanged$" shouldn't be included in list of stateTriggers, it's added automatically`
      );
    }

    const stateConfig: StatefulConfig = {
      delay: 1000,
      stateKey: ctor.name,
      ...stateParams,
      stateTriggers: [...stateParams.stateTriggers, 'stateChanged$']
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
      cmp.__state = null;

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

      combineLatest(...observers)
        .pipe(
          debounceTime(stateConfig.delay || 1000),
          switchMap(data =>
            observableOf(
              cmp.calculateState(stateConfig.stateProperties, initialState)
            )
          )
        )
        .subscribe(cmp.storeState);

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
        initialState?: Params
      ): Params {
        return stateManagementService.calculateState(
          ctor,
          cmp,
          props,
          initialState
        );
      };

    proto.storeState =
      proto.storeState ||
      function(state: Params): void {
        if (stateConfig.debug) {
          console.log('storeState => ', state);
        }

        cmp.__state = state;

        if (state) {
          statefulService.set(stateConfig.stateKey, state);
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
