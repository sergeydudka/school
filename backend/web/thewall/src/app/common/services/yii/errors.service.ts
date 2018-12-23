import { Injectable } from '@angular/core';
import { YIIResponse } from '../../models/yii/yii-response.model';
import { NotificationsService } from 'angular2-notifications';

@Injectable({
  providedIn: 'root'
})
export class ErrorsService {
  constructor(private notificationsService: NotificationsService) {}

  /**
   * Helper method to show meaningfull error message
   * when status is not true
   *
   * @param response server response
   */
  showServerErrors(response: YIIResponse): void {
    console.error(response.errors);

    let msg = '';
    for (const i in response.errors) {
      msg += `${i}: ${response.errors[i]}`;
    }

    // TODO: langs
    this.notificationsService.error(`Error`, msg);
  }
}
