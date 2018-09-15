import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DynamicMasterDetailComponent } from './dynamic-master-detail.component';

describe('DynamicMasterDetailComponent', () => {
  let component: DynamicMasterDetailComponent;
  let fixture: ComponentFixture<DynamicMasterDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DynamicMasterDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DynamicMasterDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
