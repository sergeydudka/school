import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

// @angular/material
import { MatAutocompleteModule, MatDialogModule, MatButtonModule } from '@angular/material';

// app specific
import { SearchFieldComponent } from '../../common/components/search-field/search-field.component';
import { ReactiveFormsModule } from '@angular/forms';
import { ActionDialogContentComponent } from 'src/app/common/components/action-dialog-content/action-dialog-content.component';

@NgModule({
  imports: [
    CommonModule,
    ReactiveFormsModule,
    MatAutocompleteModule,
    MatDialogModule,
    MatButtonModule,
  ],
  entryComponents: [
    ActionDialogContentComponent,
  ],
  declarations: [SearchFieldComponent, ActionDialogContentComponent],
  exports: [SearchFieldComponent, ActionDialogContentComponent],
})
export class SharedModule { }
