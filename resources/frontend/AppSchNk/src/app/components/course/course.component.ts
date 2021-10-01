import { Component, OnInit } from '@angular/core';
import {Courses} from "../../Models/courses";
import {CoursesService} from "../../services/courses.service";
import {MethodsService} from "../../services/methods.service";
import {ActivatedRoute} from "@angular/router";
import {Methods} from "../../Models/methods";
import {errorObject} from "rxjs/internal-compatibility";

@Component({
  selector: 'app-course',
  templateUrl: './course.component.html',
  styleUrls: ['./course.component.sass']
})
export class CourseComponent implements OnInit {

  course: Courses;
  alias: string;
  methods: Methods[];

  constructor(
    private route: ActivatedRoute,
    private coursesService: CoursesService,
    private methodsService: MethodsService
  ) {
    this.methods = [];
    this.course = errorObject;
  }

  ngOnInit(): void {

    this.route.params.subscribe(
      params => {
        this.alias = params['alias'];
      }
    );

    this.coursesService.storeCourse(this.alias).subscribe((data) => {
      this.course = data;
    })

    this.methodsService.getMethods().subscribe((data) => {
      this.methods = data;
    })
  }
}
