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

import { ActionDialogContentComponent } from 'src/app/common/components/action-dialog-content/action-dialog-content.component';
import { FieldBase } from 'src/app/common/models/fields/fields.model';
import { GlobalEventsService } from 'src/app/common/services/global-events/global-events.service';

@Component({
  selector: 'sch-detail-form',
  templateUrl: './detail-form.component.html',
  styleUrls: ['./detail-form.component.scss']
})
export class DetailFormComponent implements OnInit {
  category = '';
  module = '';
  data;
  fields: FieldBase<any>[];
  idProperty: string;

  form: FormGroup;

  closeOnSave = false;
  isSubmiting = false;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private formService: FormService,
    private api: ApiService,
    private crud: YiiCrudService,
    private dialog: MatDialog,
    private globalEventsService: GlobalEventsService
  ) {}

  ngOnInit() {
    this.form = new FormGroup({});

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
    if (!this.form || !this.form.dirty) return true;

    // TODO: consider creating custom reusable modal dialogs
    const dialogRef = this.dialog.open(ActionDialogContentComponent, {
      data: {
        // TODO: langs
        content: 'Leave without saving changes?'
      }
    });

    return dialogRef.afterClosed();
  }

  onSubmit() {
    if (this.form.invalid) {
      this.formService.showErrors(this.form);
      return;
    }

    this.isSubmiting = true;

    const isUpdate = !!this.data;
    const values = this.formService.getChanges(this.form);

    this.crud
      .save({
        ...values,
        [this.idProperty]: isUpdate ? this.data[this.idProperty] : null
      })
      .subscribe((result: YIIEntityResponse) => {
        this.isSubmiting = false;

        if (!result.status) return this.crud.showServerErrors(result);

        this.form.markAsPristine();

        // notify other components that entity has changed
        this.globalEventsService.entityChanged$.next({
          type: this.module,
          action: isUpdate ? 'update' : 'create'
        });

        if (this.closeOnSave) {
          this.closeEdit();
        }
      });
  }

  resetChanges() {
    const dialogRef = this.dialog.open(ActionDialogContentComponent, {
      data: {
        // TODO: langs
        content: 'Reset values?'
      }
    });

    dialogRef.afterClosed().subscribe(data => {
      if (!data) return;

      this.form.patchValue(this.data);
      this.form.markAsPristine();
    });
  }

  closeEdit() {
    this.router.navigate([`/${this.category}/${this.module}`]);
  }
}
