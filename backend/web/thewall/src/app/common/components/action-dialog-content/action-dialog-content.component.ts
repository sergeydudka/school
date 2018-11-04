import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material';

@Component({
  selector: 'sch-action-dialog-content',
  templateUrl: './action-dialog-content.component.html',
  styleUrls: ['./action-dialog-content.component.scss']
})
export class ActionDialogContentComponent implements OnInit {
  // TODO: langs
  title = 'Confirm action';
  // TODO: langs
  content = 'Are you sure?';

  constructor(
    @Inject(MAT_DIALOG_DATA) public data: any,
    private matDialogRef: MatDialogRef<ActionDialogContentComponent>
  ) {
    if (data) {
      this.title = data.title || this.title;
      this.content = data.content || this.content;
    }
  }

  ngOnInit() {}
}
