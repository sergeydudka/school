import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DynamicFilterRowCellComponent } from './dynamic-filter-row-cell.component';

describe('DynamicFilterRowCellComponent', () => {
  let component: DynamicFilterRowCellComponent;
  let fixture: ComponentFixture<DynamicFilterRowCellComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DynamicFilterRowCellComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DynamicFilterRowCellComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
