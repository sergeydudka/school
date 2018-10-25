import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ActionDialogContentComponent } from './action-dialog-content.component';

describe('ActionDialogContentComponent', () => {
  let component: ActionDialogContentComponent;
  let fixture: ComponentFixture<ActionDialogContentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ActionDialogContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ActionDialogContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
