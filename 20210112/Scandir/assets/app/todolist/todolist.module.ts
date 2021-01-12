import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { TodolistPageRoutingModule } from './todolist-routing.module';

import { TodolistPage } from './todolist.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    IonicModule,
    TodolistPageRoutingModule
  ],
  declarations: [TodolistPage]
})
export class TodolistPageModule {}
