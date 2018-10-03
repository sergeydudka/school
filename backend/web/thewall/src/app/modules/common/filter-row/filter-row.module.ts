import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { FilterRowDirective } from './filter-row.directive';
import { FilterRowCellComponent } from './filter-row-cell.component';
import { FilterRowFieldDirective } from './filter-row-field.directive';
import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    ReactiveFormsModule,
  ],
  providers: [],
  declarations: [FilterRowDirective, FilterRowCellComponent, FilterRowFieldDirective],
  exports: [FilterRowDirective, FilterRowCellComponent, FilterRowFieldDirective],
})
export class FilterRowModule { }
