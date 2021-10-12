import { Component, OnInit } from '@angular/core';
import {ArrayDataSource} from '@angular/cdk/collections';
import {FlatTreeControl, NestedTreeControl} from '@angular/cdk/tree';
import {SidenavService} from "../../services/sidenav.service";
import {Side_cm} from "../../Models/side_cm";
import {errorObject} from "rxjs/internal-compatibility";
import { MatTreeNestedDataSource } from '@angular/material/tree';



@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.sass']
})
export class SidenavComponent implements OnInit {

  public TREE_DATA: Side_cm[];

  constructor(
    private sidenavservice: SidenavService
  )
  {
    this.dataSource.data = [];
  }

  treeControl = new NestedTreeControl<Side_cm>(node => node.children);
  dataSource = new MatTreeNestedDataSource<Side_cm>();




  hasChild = (_: number, node: Side_cm) => !!node.children && node.children.length > 0;



  ngOnInit(): void {
    this.sidenavservice.getCourses_Methods().subscribe((data) => {
      this.dataSource.data = data;
      console.log(this.dataSource.data)
    });
  }

}
