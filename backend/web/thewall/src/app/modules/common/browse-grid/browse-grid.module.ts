import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import {
  MatTableModule,
  MatPaginatorModule,
  MatSortModule,
  MatButtonModule,
  MatIconModule,
  MatSelectModule,
  MatCheckboxModule
} from '@angular/material';
import { CdkTableModule } from '@angular/cdk/table';
import { BrowseGridComponent } from './browse-grid.component';

import { BrowseGridRoutingModule } from './browse-grid-routing.module';

import { YiiCrudService } from '../../../common/services/crud/yii-crud/yii-crud.service';
import { GridBuilderService } from '../../../common/services/grid-builder.service';

@NgModule({
  imports: [
    CommonModule,

    // @angular/material components
    MatTableModule,
    MatPaginatorModule,
    MatSortModule,
    MatButtonModule,
    MatIconModule,
    MatCheckboxModule,
    MatSelectModule,

    CdkTableModule,

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
    MatSelectModule
  ],
  providers: [YiiCrudService, GridBuilderService],
  declarations: [BrowseGridComponent]
})
export class BrowseGridModule {}
