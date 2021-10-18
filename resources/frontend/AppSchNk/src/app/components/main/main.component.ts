import { Component, OnInit } from '@angular/core';
import {Courses} from "../../Models/courses";
import {CoursesService} from "../../services/courses.service";
import {errorObject} from "rxjs/internal-compatibility";

@Component({
  selector: 'app-main',
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.sass']
})
export class MainComponent implements OnInit {

  courses: Courses[];

  constructor(
    private coursesService: CoursesService
  ) { }

  ngOnInit(): void {
    this.coursesService.getCourses().subscribe((data) => {

      let b: Courses[] = [];
      var arr = [];

      for (var i = 0; i < data.length; i++)
        arr.push(i);
      this.shuffle(arr);

      for (let i = 0; i < 4; i++) {
        b.push(data[arr[i]])
      }

      this.courses = b;
    })
  }

  shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex ;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  }
}
