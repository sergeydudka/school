import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup } from '@angular/forms';

import { FormService } from '../../../common/services/form.service';
import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { ApiService } from '../../../common/services/api.service';
import { YIIREsponse } from '../../response.model';

@Component({
  selector: 'sch-detail-form',
  templateUrl: './detail-form.component.html',
  styleUrls: ['./detail-form.component.css']
})
export class DetailFormComponent implements OnInit {
  data;
  fields;
  idProperty: string;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private formService: FormService,
    private api: ApiService,
    private crud: YiiCrudService
  ) {}

  ngOnInit() {
    this.route.paramMap.subscribe(data => {
      const { category, module } = this.route.parent.parent.params._value,
        id = data.get('id'),
        api = this.api.getModuleApi(category, module),
        idProperty = this.api.getModuleIdProperty(category, module);

      this.crud.setApi(api);
      this.crud.setIdProperty(idProperty);

      this.idProperty = idProperty;

      // START TODO: remove this when server will be ready to send configs for fields
      if (!id) {
        this.crud.get(10).subscribe((data: YIIREsponse) => {
          for (var i in data.result.list) {
            data.result.list[i] = '';
          }

          this.data = data.result.list;
          this.fields = this.formService.generateFormData(data);
        });
      }
      // END TODO:

      if (!id) return;

      this.crud.get(+id).subscribe((data: YIIREsponse) => {
        this.data = data.result.list;
        this.fields = this.formService.generateFormData(data);
      });
    });
  }

  onSubmit(form: FormGroup) {
    const values = this.formService.getChanges(form);

    this.crud.save({
      ...values,
      [this.idProperty]: this.data[this.idProperty]
    });
  }

  onClose() {
    console.log('close');

    this.router.navigate(['../../'], {
      relativeTo: this.route
    });
  }
}
