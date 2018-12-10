import { BrowserModule } from '@angular/platform-browser';
import { NgModule, APP_INITIALIZER, Injector } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

// import { RouteReuseStrategy } from '@angular/router';

import { ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

// angular material
import {
  MatInputModule,
  MatButtonModule,
  MatSnackBarModule,
  MAT_DATE_FORMATS,
  MatDatepickerModule
} from '@angular/material';

// app specific
import { AppRoutingModule } from './app-routing.module';

import { ApiService, initApiFactory } from './common/services/api.service';
import {
  AppConfigService,
  initConfigFactory
} from './common/services/app-config.service';

import { AppComponent } from './app.component';
import { LoginComponent } from './common/components/login/login.component';
import { PageNotFoundComponent } from './common/components/page-not-found/page-not-found.component';

import { setAppInjector } from './app.injector';
import { RouteReuseStrategy } from '@angular/router';
import { CustomDetachReuseRouterStrategy } from './common/route-reuse-strategies/custom-detach-reuse-strategy';
import { ServiceWorkerModule } from '@angular/service-worker';
import { environment } from '../environments/environment';
import { MomentDateModule } from '@angular/material-moment-adapter';

import { ComponentOverlayModule } from './modules/overlay-module/overlay.module';

import { SimpleNotificationsModule } from 'angular2-notifications';
import { StatefulService } from './stateful';
import { PersistanceService } from './common/services/persistance/persistance.service';
import { AuthInterceptor } from './interceptors/auth.interceptor';

const APP_DATE_FORMATS = {
  parse: {
    dateInput: 'Y-MM-DD HH:mm:ss'
  },
  display: {
    dateInput: 'Y-MM-DD HH:mm:ss',
    monthYearLabel: 'MMM YYYY', // datepicker top left year/month format
    dateA11yLabel: 'LL',
    monthYearA11yLabel: 'MMMM YYYY'
  }
};

@NgModule({
  declarations: [AppComponent, PageNotFoundComponent, LoginComponent],
  imports: [
    // @angular modules
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,

    ReactiveFormsModule,

    // angular material
    MatInputModule,
    MatButtonModule,
    MatSnackBarModule,

    MomentDateModule,
    MatDatepickerModule,

    // app specific
    // should come before any other modules that have routings
    // to allow auth guard do it's job
    AppRoutingModule,
    ComponentOverlayModule,

    SimpleNotificationsModule.forRoot({
      position: ['top', 'right'],
      preventDuplicates: true,
      timeOut: 5000,
      icons: {
        alert: 'bare',
        error: 'bare',
        info: 'bare',
        success: 'bare',
        warn: 'bare'
      }
    }),

    ServiceWorkerModule.register('ngsw-worker.js', {
      enabled: environment.production
    })
  ],
  providers: [
    {
      provide: APP_INITIALIZER,
      useFactory: initApiFactory,
      deps: [ApiService],
      multi: true
    },
    {
      provide: RouteReuseStrategy,
      useClass: CustomDetachReuseRouterStrategy
    },
    {
      provide: APP_INITIALIZER,
      useFactory: initConfigFactory,
      deps: [AppConfigService],
      multi: true
    },
    {
      provide: MAT_DATE_FORMATS,
      useValue: APP_DATE_FORMATS
    },
    {
      provide: HTTP_INTERCEPTORS,
      useClass: AuthInterceptor,
      multi: true
    },
    {
      provide: StatefulService,
      useExisting: PersistanceService
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule {
  constructor(injector: Injector) {
    setAppInjector(injector);
  }
}
