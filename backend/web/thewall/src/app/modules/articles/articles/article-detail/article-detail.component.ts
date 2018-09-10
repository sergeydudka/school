import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';

import { FormGroup } from '@angular/forms';

import { ArticlesService } from '../../articles.service';

import { YIIREsponse } from '../../../response.model';
import { FormService } from '../../../../common/services/form.service';

import { switchMap } from 'rxjs/operators';

@Component({
  selector: 'sch-article-detail',
  templateUrl: './article-detail.component.html',
  styleUrls: ['./article-detail.component.css'],
  providers: [FormService]
})
export class ArticleDetailComponent implements OnInit {
  data;
  fields;
  idProperty: string;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private formService: FormService,
    private articleService: ArticlesService
  ) {}

  test$;

  ngOnInit() {
    this.idProperty = this.articleService.getIdProperty();

    // this.test$ = this.route.paramMap.pipe(switchMap((params: ParamMap) => this.articleService.get(+params.get('id'))));

    // this.test$.subscribe(result => {
    //   console.log('result => ', result);
    // });

    // return;

    const id = this.route.snapshot.paramMap.get('id');

    // START TODO: remove this when server will be ready to send configs for fields
    if (!id) {
      this.articleService.get(10).subscribe((data: YIIREsponse) => {
        for (var i in data.result.list) {
          data.result.list[i] = '';
        }

        this.data = data.result.list;
        this.fields = this.formService.generateFormData(data);
      });
    }
    // END TODO:

    if (!id) return;

    this.articleService.get(+id).subscribe((data: YIIREsponse) => {
      this.data = data.result.list;
      this.fields = this.formService.generateFormData(data);
    });
  }

  onSubmit(form: FormGroup) {
    const values = this.formService.getChanges(form);

    this.articleService.save({
      ...values,
      [this.idProperty]: this.data[this.idProperty]
    });
  }

  onClose() {
    console.log('close');

    this.router.navigate(['/articles']);

    // this.router.navigate(['../'], {
    //   relativeTo: this.route
    // });
  }
}
