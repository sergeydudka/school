import { Injectable } from '@angular/core';

import { BehaviorSubject } from 'rxjs';

import { ModuleConfig } from '../menu/module-config.model';

@Injectable({
  providedIn: 'root'
})
export class ActiveModulesService {
  private modules = new Map<string, ModuleConfig>();

  modulesChanged: BehaviorSubject<any> = new BehaviorSubject([]);

  constructor() {}

  add(data: ModuleConfig) {
    if (!data.addToTabs) return;

    if (this.modules.has(data.uniqueId)) {
      return console.warn(`Attempt to add existing route ${data.uniqueId}`);
    }

    this.modules.set(data.uniqueId, data);
    this.modulesChanged.next(this.modules);
  }

  remove(data: ModuleConfig) {
    console.log(`Removing module route ${data.uniqueId}`);
    if (!this.modules.has(data.uniqueId)) {
      return console.warn(`Attempt tot remove non-existing route ${data.uniqueId}`);
    }

    console.log(`Removed module route ${data.uniqueId}`);

    this.modules.delete(data.uniqueId);
    this.modulesChanged.next(Array.from(this.modules));
  }
}
