// angular imports
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// module specific imports
import { DetailFormComponent } from './detail-form.component';
import { CanDeactivateGuard } from 'src/app/can-deactivate.guard';

const routes: Routes = [
  {
    path: '',
    component: DetailFormComponent,
    canDeactivate: [
      CanDeactivateGuard
    ]
  }, {
    path: ':id',
    component: DetailFormComponent,
    canDeactivate: [
      CanDeactivateGuard
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DetailFormRoutingModule {}
