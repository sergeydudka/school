import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { Edition } from '../../models/config/edition.model';
import { ApiService } from '../api.service';
import { YIIResponse } from '../../models/yii/yii-response.model';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EditionsService {
  private editions: BehaviorSubject<Edition[]>;

  constructor(private http: HttpClient, private apiService: ApiService) {}

  getEditions() {
    if (this.editions) return this.editions;

    this.editions = new BehaviorSubject([]);

    const api = this.apiService.getModuleApi('editions', 'edition');

    this.http.get(api.index.url).subscribe((result: YIIResponse) => {
      this.editions.next(result.result.list);
    });

    return this.editions;
  }
}
