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
  MatButtonModule,
  MatInputModule,
  MatSnackBarModule
} from '@angular/material';

import { CdkTreeModule } from '@angular/cdk/tree';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { HeaderComponent } from './layout/header/header.component';
import { MenuComponent } from './layout/menu/menu.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';

import { ApiService, initApiFactory } from './common/services/api.service';
import { AppConfigService, initConfigFactory } from './common/services/app-config.service';
import { DynamicMasterDetailModule } from './modules/common/dynamic-master-detail/dynamic-master-detail.module';
import { LoginComponent } from './login/login.component';
import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [AppComponent, HeaderComponent, MenuComponent, PageNotFoundComponent, LoginComponent],
  imports: [
    // @angular modules
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,
    ReactiveFormsModule,

    // @angular/material modules
    MatSidenavModule,
    MatInputModule,
    MatListModule,
    MatIconModule,
    MatToolbarModule,
    MatTreeModule,
    MatButtonModule,
    CdkTreeModule,
    MatSnackBarModule,

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
    // {
    //   provide: APP_INITIALIZER,
    //   useFactory: initConfigFactory,
    //   deps: [AppConfigService],
    //   multi: true
    // }
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}
