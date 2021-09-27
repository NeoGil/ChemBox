import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {CourcesComponent} from "./components/cources/cources.component";



const routes: Routes = [
  {
    path: 'courses',
    component: CourcesComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
