import { isDevMode, OnInit } from '@angular/core';

import { combineLatest, of as observableOf, Subject, interval } from 'rxjs';
import { switchMap, debounceTime } from 'rxjs/operators';

import { AppInjector } from '../app.injector';
import { StatefulService } from './stateful.service';
import { StatefulConfig, Params, StatefulClass } from './stateful_hooks';
import { Component } from '@angular/compiler/src/core';

export function MakeStateful(stateParams: StatefulConfig = {}): ClassDecorator {
  return function(ctor: Function) {
    const stateConfig: StatefulConfig = {
      delay: 1000,
      stateKey: ctor.name,
      ...stateParams
    };

    const proto: StatefulClass & OnInit = ctor.prototype;

    // reference to component instance
    let cmp: Component & StatefulClass;

    // store reference to application vide state service
    let statefulService: StatefulService;

    const onInit = proto.ngOnInit;
    proto.ngOnInit = function(...args) {
      cmp = this;

      init();

      onInit && onInit.apply(this, args);
    };

    /**
     * Initializes decorator when component ready
     */
    function init() {
      cmp.__state = null;

      statefulService = AppInjector.get(StatefulService);

      const state = cmp.retrieveState();

      cmp.restoreState(state);

      initStateListeners();
    }

    /**
     * Initializes listeners to change events passed by config
     */
    function initStateListeners() {
      if (!stateConfig.stateTriggers) return;

      const observers = stateConfig.stateTriggers.map(key => {
        const keySplit = key.split('.');
        return keySplit.reduce((acc, val) => acc[val], cmp);
      });

      combineLatest(...observers)
        .pipe(
          debounceTime(stateConfig.delay || 1000),
          switchMap(data => {
            console.log('data => ', data);
            return observableOf(cmp.getState(stateConfig.stateProperties));
          })
        )
        .subscribe(cmp.storeState);
    }

    proto.getState =
      proto.getState ||
      function(props: string[]): Params {
        return props.reduce((acc, prop) => {
          if (!componentHasProperty(prop)) return acc;

          acc[prop] = cmp[prop];
          return acc;
        }, {});
      };

    proto.storeState =
      proto.storeState ||
      function(state: Params): void {
        if (stateConfig.debug) {
          console.log('storeState => ', state);
        }

        cmp.__state = state;

        statefulService.set(stateConfig.stateKey, state);
      };

    proto.retrieveState =
      proto.retrieveState ||
      function(): Params {
        return statefulService.get(stateConfig.stateKey);
      };

    proto.restoreState =
      proto.restoreState ||
      function(state: Params): void {
        if (stateConfig.debug) {
          console.log('restoreState => ', state);
        }

        cmp.__state = state;

        for (const prop in state) {
          const value = state[prop];

          if (!componentHasProperty(prop)) continue;

          cmp[prop] = value;
        }
      };

    /**
     * Checks whether component has this property
     *
     * @param prop property to check
     * @param searchInPrototype whether we should search down on prototype chaing or not
     */
    function componentHasProperty(
      prop: string,
      searchInPrototype?: boolean
    ): boolean {
      const result = searchInPrototype ? cmp[prop] : cmp.hasOwnProperty(prop);

      if (!result && isDevMode()) {
        console.warn(
          `Compoent "${ctor.name}" doesn't have ${
            searchInPrototype ? '' : 'own'
          } property "${prop}"`
        );
      }

      return result;
    }
  };
}
