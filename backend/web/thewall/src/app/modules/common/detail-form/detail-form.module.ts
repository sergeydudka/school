// angular modules
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';

import {
  MatInputModule,
  MatNativeDateModule,
  MatSelectModule,
  MatButtonModule,
  MatDatepickerModule
} from '@angular/material';

// project components
import { DynamicFormComponent } from '../../../common/components/dynamic-form/dynamic-form.component';
import { DynamicFieldComponent } from '../../../common/components/dynamic-field/dynamic-field.component';
import { DetailFormComponent } from './detail-form.component';
import { DetailFormRoutingModule } from './detail-form-routing.module';
import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { SharedModule } from '../../shared/shared.module';

@NgModule({
  imports: [
    CommonModule,

    MatInputModule,
    MatSelectModule,
    MatButtonModule,
    MatNativeDateModule,
    MatDatepickerModule,

    ReactiveFormsModule,

    SharedModule,
    DetailFormRoutingModule
  ],
  exports: [MatInputModule, MatSelectModule, ReactiveFormsModule, DynamicFormComponent, DynamicFieldComponent],
  declarations: [DynamicFormComponent, DynamicFieldComponent, DetailFormComponent],
  providers: [YiiCrudService]
})
export class DetailFormModule {}
