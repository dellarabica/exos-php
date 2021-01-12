import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'apitest',
    loadChildren: () => import('./apitest/apitest.module').then( m => m.ApitestPageModule)
  },
  {
    path: 'liste',
    loadChildren: () => import('./liste/liste.module').then( m => m.ListePageModule)
  },
  {
    path: 'newtask',
    loadChildren: () => import('./newtask/newtask.module').then( m => m.NewtaskPageModule)
  },
  {
    path: 'testpipes',
    loadChildren: () => import('./testpipes/testpipes.module').then( m => m.TestpipesPageModule)
  },
  {
    path: 'todolist',
    loadChildren: () => import('./todolist/todolist.module').then( m => m.TodolistPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules, relativeLinkResolution: 'legacy' })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
