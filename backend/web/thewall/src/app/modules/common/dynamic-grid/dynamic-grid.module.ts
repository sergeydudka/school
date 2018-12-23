import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ReactiveFormsModule } from '@angular/forms';

import {
  MatTableModule,
  MatPaginatorModule,
  MatSortModule,
  MatButtonModule,
  MatIconModule,
  MatSelectModule,
  MatCheckboxModule,
  MatAutocompleteModule,
  MatInputModule,
  MatToolbarModule,
  MatDatepickerModule,
  MatMenuModule
} from '@angular/material';
import { CdkTableModule } from '@angular/cdk/table';

import { DynamicGridRoutingModule } from './dynamic-grid-routing.module';

import { GridBuilderService } from '../../../common/services/grid-builder.service';

import { FilterRowModule } from '../filter-row/filter-row.module';
import { SharedModule } from '../../shared/shared.module';

import { DynamicGridComponent } from './dynamic-grid.component';
import { DynamicGridOutletComponent } from './dynamic-grid-outlet.component';
import {
  ContextMenuDirective,
  ContextMenuDirectivePositionGlobal
} from 'src/app/common/directives/context-menu.directive';
import { ColumnMenuComponent } from './column-menu/column-menu.component';
import { DynamicFilterRowCellComponent } from './dynamic-filter-row-cell/dynamic-filter-row-cell.component';
import { DynamicGridToolbarComponent } from './dynamic-grid-toolbar/dynamic-grid-toolbar.component';

@NgModule({
  imports: [
    CommonModule,
    SharedModule,

    ReactiveFormsModule,

    // @angular/material components
    MatTableModule,
    MatPaginatorModule,
    MatSortModule,
    MatButtonModule,
    MatIconModule,
    MatCheckboxModule,
    MatAutocompleteModule,
    MatSelectModule,
    MatInputModule,
    MatToolbarModule,
    MatDatepickerModule,
    MatMenuModule,

    CdkTableModule,

    // project modules
    FilterRowModule,

    // module routing
    DynamicGridRoutingModule
  ],
  providers: [GridBuilderService],
  declarations: [
    DynamicGridComponent,
    DynamicGridOutletComponent,
    ContextMenuDirective,
    ContextMenuDirectivePositionGlobal,
    ColumnMenuComponent,
    DynamicFilterRowCellComponent,
    DynamicGridToolbarComponent
  ]
})
export class DynamicGridModule {}
