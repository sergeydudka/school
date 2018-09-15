// angular imports
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// module specific imports
import { BrowseGridComponent } from './browse-grid.component';

const routes: Routes = [
  {
    path: '',
    component: BrowseGridComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BrowseGridRoutingModule {}
