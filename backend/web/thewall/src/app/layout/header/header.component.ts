import { Component, OnInit, Input, ElementRef } from '@angular/core';

@Component({
  selector: 'sch-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  @Input() navbar: ElementRef;

  constructor() {}

  ngOnInit() {}
}
