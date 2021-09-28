import { Component, OnInit } from '@angular/core';
import {Courses} from "../../Models/courses";
import {CoursesService} from "../../services/courses.service";
import {ActivatedRoute} from "@angular/router";

@Component({
  selector: 'app-course',
  templateUrl: './course.component.html',
  styleUrls: ['./course.component.sass']
})
export class CourseComponent implements OnInit {

  public course: Courses;
  alias: string;

  constructor(
    private route: ActivatedRoute,
    private coursesService: CoursesService
  ) { }

  ngOnInit(): void {

    this.route.params.subscribe(
      params => {
        this.alias = params['alias'];
      }
    );

    this.coursesService.storeCourse(this.alias).subscribe((data) => {
      this.course = data;
    })
  }
}
