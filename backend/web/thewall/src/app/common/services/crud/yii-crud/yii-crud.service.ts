import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { Data } from '@angular/router';

// @angular/material
import { Sort, PageEvent } from '@angular/material';

// rxjs
import { throwError, Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';

// application specific
import { CrudBaseService } from '../crud-base.service';
import { YIIResponse } from 'src/app/common/models/yii/yii-response.model';

@Injectable()
export class YiiCrudService extends CrudBaseService {
  constructor(private http: HttpClient) {
    super();
  }

  getIdProperty() {
    return this.idProperty;
  }

  get(id: number) {
    return id ? this.http.get(this.api.view.url + `?id=${id}`) : this.http.options(this.api.view.url);
  }

  list(sorting: Sort, pager: PageEvent, filters: string) {
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

    return this.http.get(url, {
      params: httpParams
    });
  }

  save(data: Data) {
    console.log('save => ', data);

    if (!data[this.idProperty]) {
      return this.create(data);
    } else {
      return this.update(data);
    }
  }

  protected create(data: Data) {
    console.log('create => ', data);

    return this.http.post(this.api.create.url, data).pipe(catchError(this.handleError)) as Observable<YIIResponse>;
  }

  protected update(data: Data) {
    console.log('update => ', data);

    return this.http
      .post(`${this.api.update.url}?id=${data[this.idProperty]}`, data)
      .pipe(catchError(this.handleError)) as Observable<YIIResponse>;
  }

  delete(id: number) {
    console.log('id => ', id);

    return this.http.delete(`${this.api.delete.url}?id=${id}`).pipe(catchError(this.handleError)) as Observable<
      YIIResponse
    >;
  }

  protected handleError(error: HttpErrorResponse) {
    if (error.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      console.error('An error occurred:', error.error.message);
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      console.error(`Backend returned code ${error.status}, ` + `body was: ${error.error}`);
    }
    // return an observable with a user-facing error message
    return throwError('Something bad happened; please try again later.');
  }
}
