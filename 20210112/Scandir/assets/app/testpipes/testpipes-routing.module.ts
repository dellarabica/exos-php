import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { TestpipesPage } from './testpipes.page';

const routes: Routes = [
  {
    path: '',
    component: TestpipesPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class TestpipesPageRoutingModule {}
