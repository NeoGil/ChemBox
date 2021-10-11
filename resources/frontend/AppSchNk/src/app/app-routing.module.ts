import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {CoursesComponent} from "./components/courses/courses.component";
import {CourseComponent} from "./components/course/course.component";
import {MaterialsComponent} from "./components/materials/materials.component";
import {MaterialComponent} from "./components/material/material.component";



const routes: Routes = [
  {
    path: 'courses',
    component: CoursesComponent,
  },
  {
    path: 'courses/:alias',
    component: CourseComponent,
  },
  {
    path: 'courses/:course/:method',
    component: MaterialsComponent,
  },
  {
    path: 'courses/:course/:method/:alias',
    component: MaterialComponent,
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
