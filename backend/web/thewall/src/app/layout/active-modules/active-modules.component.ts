import { Component, OnInit } from '@angular/core';
import { Router, NavigationEnd, RoutesRecognized } from '@angular/router';

import { ActiveModulesService } from './active-modules.service';
import { ModuleConfig } from '../menu/module-config.model';

@Component({
  selector: 'sch-active-modules',
  templateUrl: './active-modules.component.html',
  styleUrls: ['./active-modules.component.css']
})
export class ActiveModulesComponent implements OnInit {
  links: ModuleConfig[] = [];
  activeLink: string = '';

  constructor(private activeModulseService: ActiveModulesService, private router: Router) {}

  ngOnInit() {
    this.router.events.subscribe(event => {
      if (event instanceof NavigationEnd) {
        this.setActiveByUrl(event.url);
      }
    });

    this.activeModulseService.modulesChanged.subscribe((links: Map<string, ModuleConfig>) => {
      if (!links.size) return;

      this.links = Array.from(links.values());
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
   * Sets active tab by it's url
   *
   * @param url tab url
   */
  setActiveByUrl(url: string) {
    const urlSplit = url.split('?');

    const link = this.links.filter(link => urlSplit[0] === link.link)[0];

    this.activeLink = link ? link.uniqueId : '';
  }
}
