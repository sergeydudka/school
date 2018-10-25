// angular imports
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// module specific imports
import { BrowseGridComponent } from './browse-grid.component';
import { BrowseGridOutletComponent } from './browse-grid-outlet.component';

const routes: Routes = [
  {
    path: ':category/:module',
    component: BrowseGridOutletComponent,
    children: [
      {
        path: 'detail',
        loadChildren: '../detail-form/detail-form.module#DetailFormModule'
      },
      {
        path: '',
        component: BrowseGridComponent,
        data: {
          // reuse: false,
          detach: true
        }
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BrowseGridRoutingModule {}
