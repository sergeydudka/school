import { Component, OnInit, Input, Renderer2 } from '@angular/core';
import { MatSidenav } from '@angular/material';
import { AuthService } from 'src/app/auth.service';
import { UserService } from 'src/app/common/services/user/user.service';

import { EditionsService } from 'src/app/common/services/editions/editions.service';
import { Observable, Subject } from 'rxjs';
import { Edition } from 'src/app/common/models/config/edition.model';
import { AppConfigService } from 'src/app/common/services/app-config.service';
import { PersistanceService } from 'src/app/common/services/persistance/persistance.service';
import { MakeStateful, Stateful, StatefulProperty } from 'src/app/stateful';

interface Theme {
  id: string;
  title: string;
}

@Component({
  selector: 'sch-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
@MakeStateful()
export class HeaderComponent implements OnInit, Stateful {
  stateChanged$: Subject<any> = new Subject();

  @Input()
  navbar: MatSidenav;

  editions$: Observable<Edition[]>;
  currentEdition: Edition;

  // TODO: dynamic values?
  // TODO: langs
  themes: Theme[] = [
    {
      id: 'light',
      title: 'Light theme'
    },
    {
      id: 'dark',
      title: 'Dark theme'
    }
  ];

  @StatefulProperty
  theme: Theme;

  constructor(
    private authService: AuthService,
    private userService: UserService,
    private editionsService: EditionsService,
    private configService: AppConfigService,
    private persistanceService: PersistanceService,
    private renderer: Renderer2
  ) {}

  ngOnInit() {
    this.theme = this.themes[0];
    this.updateApplicationTheme(this.theme);

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

  changeTheme(theme: Theme): void {
    this.theme = theme;
    this.updateApplicationTheme(theme);
  }

  stateRestored() {
    this.updateApplicationTheme(this.theme);
  }

  private updateApplicationTheme(newTheme: Theme): void {
    this.themes.forEach(theme => {
      if (theme.id === newTheme.id) return;

      // TODO: check this on SSR
      this.renderer.removeClass(document.body, `${theme.id}-theme`);
    });

    // TODO: check this on SSR
    this.renderer.addClass(document.body, `${newTheme.id}-theme`);
  }
}
