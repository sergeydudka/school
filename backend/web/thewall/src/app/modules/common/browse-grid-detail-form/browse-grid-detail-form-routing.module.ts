import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BrowseGridDetailFormComponent } from './browse-grid-detail-form.component';

const routes: Routes = [
  {
    path: '',
    component: BrowseGridDetailFormComponent,
    children: [
      {
        path: '',
        data: {
          detach: true
        },
        loadChildren: '../dynamic-grid/dynamic-grid.module#DynamicGridModule'
      },
      {
        path: 'detail',
        loadChildren: '../detail-form/detail-form.module#DetailFormModule'
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BrowseGridDetailFormRoutingModule {}
