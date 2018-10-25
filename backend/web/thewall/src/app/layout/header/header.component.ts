import { Component, OnInit, Input } from '@angular/core';
import { MatSidenav } from '@angular/material';
import { AuthService } from 'src/app/auth.service';
import { UserService } from 'src/app/common/services/user/user.service';

@Component({
  selector: 'sch-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  @Input()
  navbar: MatSidenav;

  constructor(private authService: AuthService, private userService: UserService) {}

  ngOnInit() {}

  onLogoutBtnClick() {
    this.authService.logout();
  }
}
