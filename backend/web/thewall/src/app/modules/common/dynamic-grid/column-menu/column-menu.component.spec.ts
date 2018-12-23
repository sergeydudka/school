import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ColumnMenuComponent } from './column-menu.component';

describe('ColumnMenuComponent', () => {
  let component: ColumnMenuComponent;
  let fixture: ComponentFixture<ColumnMenuComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ColumnMenuComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ColumnMenuComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
