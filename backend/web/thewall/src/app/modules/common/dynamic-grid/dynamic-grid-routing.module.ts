// angular imports
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// module specific imports
import { DynamicGridComponent } from './dynamic-grid.component';

const routes: Routes = [
  {
    path: '',
    component: DynamicGridComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DynamicGridRoutingModule {}
