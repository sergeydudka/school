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
    if (!this.modules.has(data.uniqueId)) {
      return console.warn(`Attempt tot remove non-existing route ${data.uniqueId}`);
    }

    this.modules.delete(data.uniqueId);
    this.modulesChanged.next(this.modules);
  }

  hasModule(uniqueId: string): boolean {
    return this.modules.has(uniqueId);
  }

  getModule(uniqueId: string): ModuleConfig | null {
    let result = null;

    if (this.hasModule(uniqueId)) {
      result = this.modules.get(uniqueId);
    }

    return result;
  }
}
