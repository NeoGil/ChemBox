import {Component, NgModule, OnInit} from '@angular/core';
import {CoursesService} from "../../services/courses.service";
import {Courses} from "../../Models/courses";
import {NavigationEnd, Router} from "@angular/router";

@Component({
  selector: 'app-courses',
  templateUrl: './courses.component.html',
  styleUrls: ['./courses.component.sass']
})


export class CoursesComponent implements OnInit {

  courses: Courses[];

  constructor(
    private coursesService: CoursesService,
    private router: Router
  ) {
  }

  ngOnInit(): void {

    this.coursesService.getCourses().subscribe((data) => {
      this.courses = data;
    })
  }

}
