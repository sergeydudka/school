import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PageNotFoundComponent } from './page-not-found/page-not-found.component';

const routes: Routes = [
  { path: 'articles', loadChildren: './modules/articles/articles.module#ArticlesModule' },
  // { path: 'users', loadChildren: './modules/users/users.module#UsersModule' },

  // TODO: use user localStorage option or configs default module
  { path: '', redirectTo: 'articles', pathMatch: 'full' },

  { path: '**', component: PageNotFoundComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
