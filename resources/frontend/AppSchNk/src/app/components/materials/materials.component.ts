import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from "@angular/router";
import {Material} from "../../Models/material";
import {MaterialsService} from "../../services/materials.service";
import {Materials} from "../../Models/materials";
import {errorObject} from "rxjs/internal-compatibility";

@Component({
  selector: 'app-materials',
  templateUrl: './materials.component.html',
  styleUrls: ['./materials.component.sass']
})
export class MaterialsComponent implements OnInit {

  materials: Materials
  private course: string;
  private method: string;

  constructor(
    private materialsService: MaterialsService,
    private route: ActivatedRoute,
  ) {
    this.materials = errorObject
  }

  ngOnInit(): void {
    this.route.params.subscribe(
      params => {
        this.course = params['course'];
        this.method = params['method'];
      }
    );
    this.getMaterials();
  }

  getMaterials(): void {
    this.materialsService.getMaterials(this.course, this.method).subscribe((data: Materials) => {
        this.materials = data;
      }
    );
  }

}
