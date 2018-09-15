// angular imports
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// module specific imports
import { DetailFormComponent } from './detail-form.component';

const routes: Routes = [
  {
    path: ':id',
    component: DetailFormComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DetailFormRoutingModule {}
