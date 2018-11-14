import { Component, OnInit, Input } from '@angular/core';
import { MatSidenav } from '@angular/material';
import { AuthService } from 'src/app/auth.service';
import { UserService } from 'src/app/common/services/user/user.service';

import { EditionsService } from 'src/app/common/services/editions/editions.service';
import { Observable } from 'rxjs';
import { Edition } from 'src/app/common/models/config/edition.model';
import { AppConfigService } from 'src/app/common/services/app-config.service';
import { PersistanceService } from 'src/app/common/services/persistance/persistance.service';

@Component({
  selector: 'sch-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  @Input()
  navbar: MatSidenav;

  editions$: Observable<Edition[]>;
  currentEdition: Edition;

  constructor(
    private authService: AuthService,
    private userService: UserService,
    private editionsService: EditionsService,
    private configService: AppConfigService,
    private persistanceService: PersistanceService
  ) {}

  ngOnInit() {
    this.editions$ = this.editionsService.getEditions();

    this.configService.config.subscribe(config => {
      this.currentEdition = config.edition;
    });
  }

  onLogoutBtnClick() {
    this.authService.logout();
  }

  changeEdition(edition: Edition) {
    this.persistanceService.set('edition', JSON.stringify(edition));

    window.location.reload();
  }
}
