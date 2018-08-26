import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'sch-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.css']
})
export class UsersComponent implements OnInit {
  constructor() {
    console.log('test');
  }

  ngOnInit() {}
}
