import {Component, OnInit} from '@angular/core';
import {CoursesService} from "../../services/courses.service";
import {Courses} from "../../Models/courses";

@Component({
  selector: 'app-courses',
  templateUrl: './courses.component.html',
  styleUrls: ['./courses.component.sass']
})


export class CoursesComponent implements OnInit {

  courses: Courses[];

  constructor(
    private coursesService: CoursesService
  ) { }

  ngOnInit(): void {

    this.coursesService.getCourses().subscribe((data) => {
      this.courses = data;
    })
  }
}
