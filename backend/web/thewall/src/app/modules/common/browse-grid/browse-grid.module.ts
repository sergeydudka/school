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
  MatToolbarModule
} from '@angular/material';
import { CdkTableModule } from '@angular/cdk/table';
import { BrowseGridComponent } from './browse-grid.component';

import { BrowseGridRoutingModule } from './browse-grid-routing.module';

import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { GridBuilderService } from '../../../common/services/grid-builder.service';

import { FilterRowModule } from '../filter-row/filter-row.module';
import { SharedModule } from '../../shared/shared.module';

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

    CdkTableModule,

    // project modules
    FilterRowModule,

    // module routing
    BrowseGridRoutingModule
  ],
  exports: [
    MatTableModule,
    MatPaginatorModule,
    MatSortModule,
    MatButtonModule,
    MatIconModule,
    MatCheckboxModule,
    MatAutocompleteModule,
    MatSelectModule,
    MatInputModule,
  ],
  providers: [YiiCrudService, GridBuilderService],
  declarations: [
    BrowseGridComponent,
  ]
})
export class BrowseGridModule {}
