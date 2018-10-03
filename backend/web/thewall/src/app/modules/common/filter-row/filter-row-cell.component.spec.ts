import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FilterRowCellComponent } from './filter-row-cell.component';

describe('FilterRowCellComponent', () => {
  let component: FilterRowCellComponent;
  let fixture: ComponentFixture<FilterRowCellComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FilterRowCellComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FilterRowCellComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
