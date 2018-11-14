import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

// angular material
import {
  MatIconModule,
  MatSidenavModule,
  MatListModule,
  MatToolbarModule,
  MatTreeModule,
  MatButtonModule,
  MatTabsModule,
  MatDialogModule,
  MatMenuModule
} from '@angular/material';

import { CdkTreeModule } from '@angular/cdk/tree';

// app specific
import { HeaderComponent } from '../../layout/header/header.component';
import { MenuComponent } from '../../layout/menu/menu.component';

import { LayoutRoutingModule } from './layout-routing.module';
import { LayoutComponent } from './layout.component';

import { ActiveModulesComponent } from '../../layout/active-modules/active-modules.component';
import { SharedModule } from '../shared/shared.module';

@NgModule({
  imports: [
    CommonModule,

    // @angular/material modules
    MatSidenavModule,
    MatListModule,
    MatIconModule,
    MatButtonModule,
    MatToolbarModule,
    MatTreeModule,
    CdkTreeModule,
    MatTabsModule,
    MatDialogModule,
    MatMenuModule,

    // app specific
    LayoutRoutingModule,
    SharedModule
  ],
  declarations: [HeaderComponent, MenuComponent, LayoutComponent, ActiveModulesComponent]
})
export class LayoutModule {}
