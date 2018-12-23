import { Injectable } from '@angular/core';
import {
  HttpClient,
  HttpErrorResponse,
  HttpParams
} from '@angular/common/http';
import { Data } from '@angular/router';

// @angular/material
import { Sort, PageEvent } from '@angular/material';

// rxjs
import { throwError, Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';

// application specific
import { CrudBaseService } from '../crud-base.service';
import { YIIResponse } from 'src/app/common/models/yii/yii-response.model';
import { ErrorsService } from '../../yii/errors.service';
import { GlobalEventsService } from '../../global-events/global-events.service';
import { OverlayService } from 'src/app/modules/overlay-module/overlay.service';
import { NotificationsService } from 'angular2-notifications';

@Injectable()
export class YiiCrudService extends CrudBaseService {
  constructor(
    private http: HttpClient,
    private globalEventsService: GlobalEventsService,
    private overlayService: OverlayService,
    private errorsService: ErrorsService,
    private notificationsService: NotificationsService
  ) {
    super();
  }

  getIdProperty() {
    return this.idProperty;
  }

  get(id: number) {
    return id
      ? this.http.get(this.api.view.url + `?id=${id}`)
      : this.http.options(this.api.view.url);
  }

  list(
    sorting: Sort,
    pager: PageEvent,
    filters: string,
    cb?: (response?: YIIResponse) => void
  ) {
    const url = this.api.index.url,
      page = '' + (pager.pageIndex + 1),
      perPage = '' + pager.pageSize,
      sortDir = sorting.direction === 'desc' ? '-' : '',
      sortField = sorting.active,
      sort = sortDir + sortField;

    const httpParams = new HttpParams({
      fromObject: {
        page,
        'per-page': perPage,
        sort,
        filters
      }
    });

    const observable = this.http.get(url, {
      params: httpParams
    });

    this.performAction(observable, 'read', cb);
  }

  /**
   * Saves/updates `data` based on it's state
   *
   * @param data inforamtion to take action upon
   * @param cb function to call when response from server arrives
   */
  save(data: Data, cb?: (response?: YIIResponse) => void) {
    const isUpdate = data[this.idProperty];

    let observable: Observable<Object>;

    if (isUpdate) {
      observable = this.update(data);
    } else {
      observable = this.create(data);
    }

    this.performAction(observable, isUpdate ? 'update' : 'create', cb);
  }

  protected create(data: Data) {
    return this.http.post(this.api.create.url, data);
  }

  protected update(data: Data) {
    return this.http.post(
      `${this.api.update.url}?id=${data[this.idProperty]}`,
      data
    );
  }

  /**
   * Removes element by ID
   *
   * @param id entity ID
   * @param cb callback function
   */
  delete(id: number, cb?: (response?: YIIResponse) => void) {
    const observable = this.http.delete(`${this.api.delete.url}?id=${id}`);

    this.performAction(observable, 'delete', cb);
  }

  protected performAction(
    observable: Observable<Object>,
    action: 'create' | 'read' | 'update' | 'delete',
    cb?: (response?: YIIResponse) => void
  ) {
    if (this.beforeAction() === false) return cb();

    observable
      .pipe(catchError(this.handleError(cb)))
      .subscribe((result: YIIResponse) => {
        this.afterAction(result);

        if (!result.status) this.showServerErrors(result);

        if (action !== 'read') {
          // TODO: langs and message
          this.notificationsService.info('Success', action, {
            showProgressBar: false
          });
        }

        cb(result);

        // notify entity changed if specified
        if (this.entity && action !== 'read') {
          this.globalEventsService.entityChanged$.next({
            type: this.entity,
            action: action
          });
        }
      });
  }

  /**
   * Called before CRUD action.
   * Return `false` to prevent action
   *
   * @param action any of CRUD actions
   */
  protected beforeAction(action?: 'create' | 'read' | 'update' | 'delete') {
    const allowAction = true;

    if (allowAction && this.target) {
      // TODO: fix error on grid browse and remove this
      setTimeout(() => {
        this.overlayService.show({
          target: this.target
        });
      }, 1);
    }

    return allowAction;
  }

  /**
   * Called after CRUD operation
   *
   * @param result server response
   */
  afterAction(result?: YIIResponse) {
    if (this.target) {
      // TODO: fix error on grid browse and remove this
      setTimeout(() => {
        this.overlayService.hide({
          target: this.target
        });
      }, 1);
    }
  }

  showServerErrors(response: YIIResponse): void {
    this.errorsService.showServerErrors(response);
  }

  protected handleError(cb?: (response?: YIIResponse) => void) {
    // TODO: error messages and langs
    return (error: HttpErrorResponse) => {
      // even on error we still need to call those actions
      // otherwise component won't be able to property react
      this.afterAction();
      cb();

      let msg: string;

      if (error.error instanceof ErrorEvent) {
        // A client-side or network error occurred. Handle it accordingly.
        console.error('An error occurred:', error.error.message);

        msg = `An error occurred: ${
          error.error.message
        }. <br> For more information open console.`;
      } else {
        // The backend returned an unsuccessful response code.
        // The response body may contain clues as to what went wrong,
        console.error(
          `Backend returned code ${error.status}, ` + `body was: ${error.error}`
        );

        msg = `Backend returned code: ${
          error.status
        }.<br> For more information open console.`;
      }

      // TODO: langs
      this.notificationsService.error(`Server Error`, msg);

      // return an observable with a user-facing error message
      return throwError('Something bad happened; please try again later.');
    };
  }
}
