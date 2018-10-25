import { NgModule } from '@angular/core';
import { Routes, RouterModule, UrlSegment, UrlSegmentGroup, Route } from '@angular/router';
import { LayoutComponent } from './layout.component';

import { AppInjector } from '../../app.injector';
import { MenuService } from '../../layout/menu/menu.service';
import { ModuleConfig } from 'src/app/layout/menu/module-config.model';

const modules: ModuleConfig[] = AppInjector.get(MenuService).modules;

const gridModules = modules.filter(module => module.angularModule === 'BrowseGrid');

// export required for AOT
export function urlMatcher(segments: UrlSegment[], group: UrlSegmentGroup, route: Route) {
  // we know that grid module should have at least 2 parameters
  if (segments.length < 2) return null;

  let targetModule = gridModules.filter(mod => mod.category === segments[0].path && mod.module === segments[1].path)[0];

  if (!targetModule) {
    console.error(`Cannot find grid module for specified segments ${segments}`);
    return null;
  }

  if (!route.data) route.data = {};

  Object.assign(route.data, targetModule);

  return {
    // don't consume any parameters, we will use those in module again
    consumed: []
  };
}

const routes: Routes = [
  {
    path: '',
    component: LayoutComponent,
    children: [
      // grids
      {
        path: ':category/:module',
        // inline function are not suported by AOT
        matcher: urlMatcher,
        loadChildren: '../common/browse-grid/browse-grid.module#BrowseGridModule'
      }
      // others...
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class LayoutRoutingModule {}
