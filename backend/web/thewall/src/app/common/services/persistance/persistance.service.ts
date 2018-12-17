import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class PersistanceService {
  constructor() {}

  set(key: string, data: any): void {
    try {
      localStorage.setItem(key, JSON.stringify(data));
    } catch (e) {
      console.warn(`Cannot save "${key}" to localStorage`, e);
    }
  }

  get(key: string) {
    try {
      return JSON.parse(localStorage.getItem(key));
    } catch (e) {
      console.warn(`Cannot retrieve ${key} from localStorage`, e);
      return null;
    }
  }

  remove(key: string) {
    try {
      localStorage.removeItem(key);
    } catch (e) {
      console.warn(`Cannot remove "${key}" from localStorage`, e);
    }
  }
}
