import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DynamicGridToolbarComponent } from './dynamic-grid-toolbar.component';

describe('DynamicGridToolbarComponent', () => {
  let component: DynamicGridToolbarComponent;
  let fixture: ComponentFixture<DynamicGridToolbarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DynamicGridToolbarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DynamicGridToolbarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
