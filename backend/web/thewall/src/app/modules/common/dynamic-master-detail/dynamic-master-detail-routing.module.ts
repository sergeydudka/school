import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// module services
import { MasterDetailService } from './master-detail.service';

// module components
import { DynamicMasterDetailComponent } from './dynamic-master-detail.component';

const routes: Routes = [
  {
    path: '',

    canActivate: [MasterDetailService],

    component: DynamicMasterDetailComponent,

    children: [
      {
        path: 'detail',
        loadChildren: '../detail-form/detail-form.module#DetailFormModule'
      },
      {
        path: '',
        loadChildren: '../browse-grid/browse-grid.module#BrowseGridModule'
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  declarations: [],
  exports: [RouterModule]
})
export class DynamicMasterDetailRoutingModule {}
