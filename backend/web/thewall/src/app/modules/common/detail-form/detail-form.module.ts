import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { MatInputModule, MatDatepickerModule, MatNativeDateModule, MAT_DATE_FORMATS } from '@angular/material';
import { MomentDateModule } from '@angular/material-moment-adapter';

const APP_DATE_FORMATS = {
  parse: {
    dateInput: 'YYYY-MM-DD kk:mm:ss'
  },
  display: {
    dateInput: 'LL',
    monthYearLabel: 'MMM YYYY',
    dateA11yLabel: 'LL',
    monthYearA11yLabel: 'MMMM YYYY'
  }
};

@NgModule({
  imports: [CommonModule, MatInputModule, MatDatepickerModule, MatNativeDateModule, MomentDateModule, FormsModule],
  exports: [MatInputModule, MatDatepickerModule, FormsModule],
  declarations: [],
  providers: [
    {
      provide: MAT_DATE_FORMATS,
      useValue: APP_DATE_FORMATS
    }
  ]
})
export class DetailFormModule {}
