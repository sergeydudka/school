// angular modules
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';

import {
  MatInputModule,
  MatNativeDateModule,
  MatSelectModule,
  MatButtonModule,
  MatDatepickerModule,
  MatToolbarModule
} from '@angular/material';

// project components
import { DynamicFormGroupComponent } from '../../../common/components/dynamic-form-group/dynamic-form-group.component';
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
    MatToolbarModule,

    ReactiveFormsModule,

    SharedModule,
    DetailFormRoutingModule
  ],
  exports: [
    MatInputModule,
    MatSelectModule,
    ReactiveFormsModule,
    DynamicFormGroupComponent,
    DynamicFieldComponent
  ],
  declarations: [
    DynamicFormGroupComponent,
    DynamicFieldComponent,
    DetailFormComponent
  ],
  providers: [YiiCrudService]
})
export class DetailFormModule {}
