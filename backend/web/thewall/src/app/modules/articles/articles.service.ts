import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';

import { Article } from './article.model';

import { BehaviorSubject, throwError } from 'rxjs';

import { YIIREsponse } from '../response.model';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class ArticlesService {
  dataChange = new BehaviorSubject([]);

  constructor(private http: HttpClient) {
    this.getInfo();
  }

  getArticle(id) {
    return this.http.get(`http://school.local.com/admin/articles/article/view?id=${id}`);
  }

  getInfo() {
    this.http.get('http://school.local.com/admin/articles/article?page=1').subscribe((response: YIIREsponse) => {
      this.dataChange.next(response.result.list);
    });
  }

  saveArticle(data) {
    if (!data.article_id) {
      this.createArticle(data);
    } else {
      this.updateArticle(data);
    }
  }

  private createArticle(data) {
    console.log('create => ', data);

    this.http
      .post('http://school.local.com/admin/articles/article/create', data)
      .pipe(catchError(this.handleError))
      .subscribe();
  }

  private handleError(error: HttpErrorResponse) {
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

  private updateArticle(data) {
    console.log('update => ', data);

    // this.http.post('http://school.local.com/admin/articles/article/update', {
    //   data: data
    // });
  }
}
