import { CrudBaseService } from "../crud-base.service";
import {
  HttpClient,
  HttpErrorResponse,
  HttpHeaders
} from "@angular/common/http";

import { BehaviorSubject, throwError } from "rxjs";

import { catchError } from "rxjs/operators";

export class YiiCrudService extends CrudBaseService {
  constructor(protected http: HttpClient) {
    super();
  }

  getIdProperty() {
    return this.idProperty;
  }

  get(id: number) {
    return this.http.get(this.api.view.url + `?id=${id}`);
  }

  list() {
    return this.http.get(this.api.index.url);
  }

  save(data) {
    console.log("save => ", data);

    if (!data[this.idProperty]) {
      this.create(data);
    } else {
      this.update(data);
    }
  }

  protected create(data) {
    console.log("create => ", data);

    this.http
      .post(this.api.create.url, data)
      .pipe(catchError(this.handleError))
      .subscribe();
  }

  protected update(data) {
    console.log("update => ", data);

    this.http
      .post(this.api.update.url, data)
      .pipe(catchError(this.handleError))
      .subscribe();
  }

  delete(id: number) {
    this.http
      .post(this.api.delete.url, id)
      .pipe(catchError(this.handleError))
      .subscribe();
  }

  protected handleError(error: HttpErrorResponse) {
    if (error.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      console.error("An error occurred:", error.error.message);
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      console.error(
        `Backend returned code ${error.status}, ` + `body was: ${error.error}`
      );
    }
    // return an observable with a user-facing error message
    return throwError("Something bad happened; please try again later.");
  }
}
