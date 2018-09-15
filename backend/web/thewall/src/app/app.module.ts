import { BrowserModule } from '@angular/platform-browser';
import { NgModule, APP_INITIALIZER } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { HttpClientModule } from '@angular/common/http';

import {
  MatIconModule,
  MatSidenavModule,
  MatListModule,
  MatToolbarModule,
  MatTreeModule,
  MatButtonModule
} from '@angular/material';

import { CdkTreeModule } from '@angular/cdk/tree';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { HeaderComponent } from './layout/header/header.component';
import { MenuComponent } from './layout/menu/menu.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';

import { ApiService, initApiFactory } from './common/services/api.service';
import { DynamicMasterDetailModule } from './modules/common/dynamic-master-detail/dynamic-master-detail.module';

@NgModule({
  declarations: [AppComponent, HeaderComponent, MenuComponent, PageNotFoundComponent],
  imports: [
    // @angular modules
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,

    // @angular/material modules
    MatSidenavModule,
    MatListModule,
    MatIconModule,
    MatToolbarModule,
    MatTreeModule,
    MatButtonModule,
    CdkTreeModule,

    // routing modules
    AppRoutingModule,
    DynamicMasterDetailModule
  ],
  providers: [
    {
      provide: APP_INITIALIZER,
      useFactory: initApiFactory,
      deps: [ApiService],
      multi: true
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}
