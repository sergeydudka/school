import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup } from '@angular/forms';

// @angular/material
import { MatDialog } from '@angular/material';

// app specific
import { FormService } from '../../../common/services/form.service';
import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { ApiService } from '../../../common/services/api.service';
import { YIIEntityResponse } from '../../../common/models/yii/yii-entity-response.model';
import { DynamicFormComponent } from 'src/app/common/components/dynamic-form/dynamic-form.component';

import { ActionDialogContentComponent } from 'src/app/common/components/action-dialog-content/action-dialog-content.component';

@Component({
  selector: 'sch-detail-form',
  templateUrl: './detail-form.component.html',
  styleUrls: ['./detail-form.component.scss']
})
export class DetailFormComponent implements OnInit {
  category = '';
  module = '';
  data;
  fields;
  idProperty: string;

  @ViewChild('form')
  form: DynamicFormComponent;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private formService: FormService,
    private api: ApiService,
    private crud: YiiCrudService,
    private dialog: MatDialog
  ) {}

  ngOnInit() {
    this.category = this.route.parent.parent.snapshot.data.category;
    this.module = this.route.parent.parent.snapshot.data.module;

    this.route.params.subscribe(params => {
      const { id } = params,
        api = this.api.getModuleApi(this.category, this.module),
        idProperty = this.api.getModuleIdProperty(this.category, this.module);

      this.crud.setApi(api);
      this.crud.setIdProperty(idProperty);

      this.idProperty = idProperty;

      this.crud.get(+id).subscribe((data: YIIEntityResponse) => {
        this.fields = this.formService.generateFields(data);

        if (id) {
          this.data = data.result.list;
        }
      });
    });
  }

  canDeactivate() {
    // this.form can be empty on initial redirect
    if (!this.form || !this.form.form.dirty) return true;

    // TODO: consider creating custom reusable modal dialogs
    const dialogRef = this.dialog.open(ActionDialogContentComponent, {
      data: {
        // TODO: langs
        content: 'Leave without saving changes?'
      }
    });

    return dialogRef.afterClosed();
  }

  onSubmit(form: FormGroup) {
    const values = this.formService.getChanges(form);

    this.crud
      .save({
        ...values,
        [this.idProperty]: this.data ? this.data[this.idProperty] : null
      })
      .subscribe(result => {
        console.log('submitted => ', result);
      });
  }

  onClose() {
    this.router.navigate([`/${this.category}/${this.module}`]);
  }
}
