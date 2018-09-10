// angular modules
import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { ReactiveFormsModule } from "@angular/forms";

import {
  MatInputModule,
  MatDatepickerModule,
  MatNativeDateModule,
  MatSelectModule,
  MatButtonModule,
  MAT_DATE_FORMATS
} from "@angular/material";
import { MomentDateModule } from "@angular/material-moment-adapter";

// project components
import { DynamicFormComponent } from "../../../common/components/dynamic-form/dynamic-form.component";
import { DynamicFieldComponent } from "../../../common/components/dynamic-field/dynamic-field.component";

const APP_DATE_FORMATS = {
  parse: {
    dateInput: "YYYY-MM-DD kk:mm:ss"
  },
  display: {
    dateInput: "LL",
    monthYearLabel: "MMM YYYY",
    dateA11yLabel: "LL",
    monthYearA11yLabel: "MMMM YYYY"
  }
};

@NgModule({
  imports: [
    CommonModule,

    MatInputModule,
    MatSelectModule,
    MatButtonModule,
    MatDatepickerModule,
    MatNativeDateModule,

    MomentDateModule,
    ReactiveFormsModule
  ],
  exports: [
    MatInputModule,
    MatSelectModule,
    MatDatepickerModule,
    ReactiveFormsModule,
    DynamicFormComponent,
    DynamicFieldComponent
  ],
  declarations: [DynamicFormComponent, DynamicFieldComponent],
  providers: [
    {
      provide: MAT_DATE_FORMATS,
      useValue: APP_DATE_FORMATS
    }
  ]
})
export class DetailFormModule {}
