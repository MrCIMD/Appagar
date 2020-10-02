import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { EgressPage } from './egress.page';

const routes: Routes = [
  {
    path: '',
    component: EgressPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class EgressPageRoutingModule {}
