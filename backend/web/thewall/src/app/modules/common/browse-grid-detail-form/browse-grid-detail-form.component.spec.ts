import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BrowseGridDetailFormComponent } from './browse-grid-detail-form.component';

describe('BrowseGridDetailFormComponent', () => {
  let component: BrowseGridDetailFormComponent;
  let fixture: ComponentFixture<BrowseGridDetailFormComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BrowseGridDetailFormComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BrowseGridDetailFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
