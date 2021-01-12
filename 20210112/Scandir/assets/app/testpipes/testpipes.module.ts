import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { TestpipesPageRoutingModule } from './testpipes-routing.module';

import { TestpipesPage } from './testpipes.page';
import { PipesModule } from '../pipes/pipes.module';

@NgModule({
  imports: [
    CommonModule,
    PipesModule,
    FormsModule,
    IonicModule,
    TestpipesPageRoutingModule
  ],
  declarations: [TestpipesPage]
})
export class TestpipesPageModule {}
