import {Component, NgModule, OnInit, ViewChild} from '@angular/core';
import {MaterialsService} from "../../services/materials.service";
import {ActivatedRoute} from "@angular/router";
import {errorObject} from "rxjs/internal-compatibility";
import {Material} from "../../Models/material";

@Component({
  selector: 'app-material',
  templateUrl: './material.component.html',
  styleUrls: ['./material.component.sass']
})
export class MaterialComponent implements OnInit {

  material: Material;
  private course: string;
  private method: string;
  private alias: string;

  isQuestionCardShow = false;

  @ViewChild('questionTest') questionTest: any;

  constructor(
    private materialsService: MaterialsService,
    private route: ActivatedRoute,
  ) {
    this.material = errorObject
  }

  ngOnInit(): void {
    this.route.params.subscribe(
      params => {
        this.course = params['course'];
        this.method = params['method'];
        this.alias = params['alias'];
      }
    );
    this.storeMaterials();
  }

  storeMaterials(): void {
    this.materialsService.storeMaterials(this.course, this.method, this.alias).subscribe((data: Material) => {

        this.material = data;

        console.log(this.material)
      }
    );
  }

  startQuiz() {
    this.isQuestionCardShow = true;
  }
}
