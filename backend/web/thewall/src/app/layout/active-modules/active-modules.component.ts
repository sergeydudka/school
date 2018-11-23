import { Component, OnInit } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';

// @angular/material
import { MatDialog } from '@angular/material';

// application specific
import { ActiveModulesService } from './active-modules.service';
import { ModuleConfig } from '../menu/module-config.model';

// application specific logic
import { ActionDialogContentComponent } from 'src/app/common/components/action-dialog-content/action-dialog-content.component';

@Component({
  selector: 'sch-active-modules',
  templateUrl: './active-modules.component.html',
  styleUrls: ['./active-modules.component.scss']
})
export class ActiveModulesComponent implements OnInit {
  links: ModuleConfig[] = [];
  activeLink: string = '';

  constructor(private activeModulseService: ActiveModulesService, private router: Router, private dialog: MatDialog) {}

  ngOnInit() {
    this.router.events.subscribe(event => {
      if (event instanceof NavigationEnd) {
        this.setActiveByUrl(event.url);
      }
    });

    this.activeModulseService.modulesChanged.subscribe((links: Map<string, ModuleConfig>) => {
      this.links = Array.from(links.values());

      if (!links.size) return;

      this.activeLink = this.links[this.links.length - 1].uniqueId;
    });
  }

  /**
   * Sets active tab by it's unique identifier
   *
   * @param uniqueId tab unique identifier
   */
  setActive(uniqueId: string) {
    this.activeLink = uniqueId;
  }

  /**
   * Navigates to provided module
   *
   * @param module module that we navigate to
   */
  navigate(module: ModuleConfig) {
    this.router.navigate([module.link]);
  }

  /**
   * Sets active tab by it's url
   *
   * @param url tab url
   */
  setActiveByUrl(url: string) {
    const urlSplit = url.split('?');

    const link = this.links.filter(link => urlSplit[0] === link.link)[0];

    this.activeLink = link ? link.uniqueId : '';
  }

  /**
   * Closes specified module tab
   *
   * @param event browser event
   * @param link active module
   */
  closeModule(event: Event, link: ModuleConfig) {
    event.stopPropagation();
    event.preventDefault();

    const dialogRef = this.dialog.open(ActionDialogContentComponent, {
      data: {
        // TODO: langs
        content: 'Close this component?'
      }
    });

    dialogRef.afterClosed().subscribe(value => {
      if (!value) return;

      link.pendingDestroy = true;

      // if it's the only link, we navigation to root of application
      if (this.links.length === 1) {
        this.router.navigate(['/']);

        // if closed module is not active we don't need to take any actions
      } else if (link.uniqueId !== this.activeLink) {
        return;

        // if we close active tab
      } else {
        // if closing tab is not firsrt, chose it
        if (this.links[0].uniqueId !== link.uniqueId) {
          this.navigate(this.links[0]);

          // otherwise first one after it
        } else {
          this.navigate(this.links[1]);
        }
      }
    });
  }
}
