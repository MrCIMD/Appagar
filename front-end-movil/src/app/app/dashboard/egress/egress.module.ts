import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { EgressPageRoutingModule } from './egress-routing.module';

import { EgressPage } from './egress.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    EgressPageRoutingModule
  ],
  declarations: [EgressPage]
})
export class EgressPageModule {}
