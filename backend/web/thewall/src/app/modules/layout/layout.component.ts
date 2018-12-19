import { MediaMatcher } from '@angular/cdk/layout';
import { Component, ChangeDetectorRef, OnInit, OnDestroy } from '@angular/core';

import { Subject } from 'rxjs';

import { MakeStateful, Stateful, StatefulProperty } from 'src/app/stateful';

@Component({
  selector: 'sch-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.scss']
})
@MakeStateful({
  stateProperties: ['sidenavOpened']
})
export class LayoutComponent implements OnInit, OnDestroy, Stateful {
  stateChanged$: Subject<void | string> = new Subject();

  @StatefulProperty
  sidenavOpened = true;
  headerHeight = 50;
  mobileQuery: MediaQueryList;

  private _mobileQueryListener: () => void;

  constructor(
    private changeDetectorRef: ChangeDetectorRef,
    private media: MediaMatcher
  ) {}

  ngOnInit() {
    this.mobileQuery = this.media.matchMedia('(max-width: 600px)');
    this._mobileQueryListener = () => this.changeDetectorRef.detectChanges();
    this.mobileQuery.addListener(this._mobileQueryListener);
  }

  ngOnDestroy(): void {
    this.mobileQuery.removeListener(this._mobileQueryListener);
  }

  handleSidenavToggle(isOpened) {
    this.sidenavOpened = isOpened;
  }
}
