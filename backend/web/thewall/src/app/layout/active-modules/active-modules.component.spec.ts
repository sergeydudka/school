import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ActiveModulesComponent } from './active-modules.component';

describe('ActiveModulesComponent', () => {
  let component: ActiveModulesComponent;
  let fixture: ComponentFixture<ActiveModulesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ActiveModulesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ActiveModulesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
