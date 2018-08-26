import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { HttpClientModule } from '@angular/common/http';

import {
  MatIconModule,
  MatSidenavModule,
  MatListModule,
  MatToolbarModule,
  MatTreeModule,
  MatButtonModule

  // MatAutocompleteModule,
  // MatBadgeModule,
  // MatBottomSheetModule,
  // MatButtonToggleModule,
  // MatCardModule,
  // MatCheckboxModule,
  // MatChipsModule,
  // MatStepperModule,
  // MatDatepickerModule,
  // MatDialogModule,
  // MatDividerModule,
  // MatExpansionModule,
  // MatGridListModule,
  // MatInputModule,
  // MatMenuModule,
  // MatNativeDateModule,
  // MatPaginatorModule,
  // MatProgressBarModule,
  // MatProgressSpinnerModule,
  // MatRadioModule,
  // MatRippleModule,
  // MatSelectModule,
  // MatSliderModule,
  // MatSlideToggleModule,
  // MatSnackBarModule,
  // MatSortModule,
  // MatTableModule,
  // MatTabsModule,
  // MatTooltipModule,
} from '@angular/material';

import { CdkTreeModule } from '@angular/cdk/tree';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { HeaderComponent } from './layout/header/header.component';
import { MenuComponent } from './layout/menu/menu.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { UsersComponent } from './modules/users/users.component';

@NgModule({
  declarations: [AppComponent, HeaderComponent, MenuComponent, PageNotFoundComponent, UsersComponent],
  imports: [
    // @angular modules
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,

    // routing modules
    AppRoutingModule,

    // @angular/material modules
    MatSidenavModule,
    MatListModule,
    MatIconModule,
    MatToolbarModule,
    MatTreeModule,
    MatButtonModule,

    CdkTreeModule

    // MatAutocompleteModule,
    // MatBadgeModule,
    // MatBottomSheetModule,
    // MatButtonToggleModule,
    // MatCardModule,
    // MatCheckboxModule,
    // MatChipsModule,
    // MatStepperModule,
    // MatDatepickerModule,
    // MatDialogModule,
    // MatDividerModule,
    // MatExpansionModule,
    // MatGridListModule,
    // MatInputModule,
    // MatListModule,
    // MatMenuModule,
    // MatNativeDateModule,
    // MatPaginatorModule,
    // MatProgressBarModule,
    // MatProgressSpinnerModule,
    // MatRadioModule,
    // MatRippleModule,
    // MatSelectModule,
    // MatSliderModule,
    // MatSlideToggleModule,
    // MatSnackBarModule,
    // MatSortModule,
    // MatTableModule,
    // MatTabsModule,
    // MatTooltipModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}
