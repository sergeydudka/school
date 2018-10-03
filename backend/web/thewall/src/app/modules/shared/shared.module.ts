import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SearchFieldComponent } from '../../common/components/search-field/search-field.component';
import { ReactiveFormsModule } from '@angular/forms';
import { MatAutocompleteModule } from '@angular/material';

@NgModule({
  imports: [
    CommonModule,
    ReactiveFormsModule,
    MatAutocompleteModule,
  ],
  declarations: [SearchFieldComponent],
  exports: [SearchFieldComponent],
})
export class SharedModule { }
