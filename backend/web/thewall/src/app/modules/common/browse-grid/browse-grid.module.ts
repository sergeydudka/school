import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MatTableModule, MatPaginatorModule } from '@angular/material';
import { CdkTableModule } from '@angular/cdk/table';

@NgModule({
  imports: [
    CommonModule,
    MatTableModule,
    MatPaginatorModule,
    CdkTableModule,
  ],
  exports: [
    MatTableModule, MatPaginatorModule
  ],
  declarations: []
})
export class BrowseGridModule { }
