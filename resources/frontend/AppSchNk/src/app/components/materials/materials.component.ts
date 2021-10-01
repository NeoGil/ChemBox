import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, NavigationEnd, Router} from "@angular/router";
import {NavigationService} from "../../services/navigation.service";
import {Material} from "../../Models/material";
import {MaterialsService} from "../../services/materials.service";

@Component({
  selector: 'app-materials',
  templateUrl: './materials.component.html',
  styleUrls: ['./materials.component.sass']
})
export class MaterialsComponent implements OnInit {

  materials: Material[]
  private course: string;
  private method: string;

  constructor(
    private materialsService: MaterialsService,
    private route: ActivatedRoute,
  ) {
    this.materials = []
  }

  ngOnInit(): void {
    this.route.params.subscribe(
      params => {
        this.course = params['course'];
        this.method = params['method'];
      }
    );
    this.getMenu();
    //console.log(this.materials)
  }

  getMenu(): void {
    this.materialsService.getMaterials(this.course, this.method).subscribe((data: Material[]) => {
        this.materials = data;
        console.log(this.materials)
        // let tmpLeads : Material[] = this.materials;
        // // data[1].forEach(function (item) {
        // //     console.log(item)
        // //   })
        // for (let item of data as Material[]) {
        //   tmpLeads.push(item as Material)
        // }
        //console.log(tmpLeads)


        // this.materials = tmpLeads;
      }
    );
  }

}
