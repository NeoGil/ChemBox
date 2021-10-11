import { Component, OnInit } from '@angular/core';
import {ArrayDataSource} from '@angular/cdk/collections';
import {FlatTreeControl} from '@angular/cdk/tree';
import {SidenavService} from "../../services/sidenav.service";
import {Side_cm} from "../../Models/side_cm";
import {errorObject} from "rxjs/internal-compatibility";


let TREE_DATA: Side_cm[] = [];

/** Flat node with expandable and level information */
interface ExampleFlatNode {
  expandable: boolean;
  name: string;
  level: number;
  route: string;
  isExpanded?: boolean;
}

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
    this.TREE_DATA = [];
    this.sidenavservice.getCourses_Methods().subscribe((data) => {
      console.log(this.TREE_DATA)
      TREE_DATA = data;
      console.log(this.TREE_DATA)
    });


  }

  ngOnInit(): void {
    // setTimeout(() => {
    //   this.sidenavservice.getCourses_Methods().subscribe((data) => {
    //     console.log(this.TREE_DATA)
    //     this.TREE_DATA = data;
    //     console.log(this.TREE_DATA)
    //   });
    // },10);
    // console.log(this.TREE_DATA)


  }


  treeControl = new FlatTreeControl<Side_cm>(
    node => node.level, node => node.expandable);

  dataSource = new ArrayDataSource(TREE_DATA);

  hasChild = (_: number, node: Side_cm) => node.expandable;


  getParentNode(node: Side_cm) {
    const nodeIndex = TREE_DATA.indexOf(node);

    for (let i = nodeIndex - 1; i >= 0; i--) {
      if (TREE_DATA[i].level === node.level - 1) {
        return TREE_DATA[i];
      }
    }

    return null;
  }

  shouldRender(node: Side_cm) {
    let parent = this.getParentNode(node);
    while (parent) {
      if (!parent.isExpanded) {
        return false;
      }
      parent = this.getParentNode(parent);
    }
    return true;
  }



}
