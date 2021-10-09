import { Component, OnInit } from '@angular/core';
import {ArrayDataSource} from '@angular/cdk/collections';
import {FlatTreeControl} from '@angular/cdk/tree';


const TREE_DATA: ExampleFlatNode[] = [
  {
    name: 'Next',
    expandable: true,
    level: 0,
    learn: 2
  }, {
    name: 'Test',
    expandable: true,
    level: 1,
    learn: 2
  }, {
    name: 'Название теста',
    expandable: false,
    level: 2,
    learn: 2
  }, {
    name: 'Название теста',
    expandable: false,
    level: 2,
    learn: 2
  }, {
    name: 'Название тестаа',
    expandable: false,
    level: 2,
    learn: 2
  }, {
    name: 'Название теста',
    expandable: false,
    level: 2,
    learn: 2
  }, {
    name: 'Text',
    expandable: true,
    level: 1,
    learn: 2
  }, {
    name: 'Название текста',
    expandable: false,
    level: 2,
    learn: 2
  },{
    name: 'Fruit loops',
    expandable: false,
    level: 2,
    learn: 2
  }, {
    name: 'Vegetables',
    expandable: true,
    level: 0,
    learn: 2
  }, {
    name: 'Green',
    expandable: true,
    level: 1,
    learn: 2
  }, {
    name: 'Broccoli',
    expandable: false,
    level: 2,
    isExpanded: false,
    learn: 2
  }, {
    name: 'Brussels sprouts',
    expandable: false,
    level: 2,
    learn: 2
  }, {
    name: 'Orange',
    expandable: true,
    level: 1,
    learn: 2
  }, {
    name: 'Pumpkins',
    expandable: false,
    level: 2,
    learn: 2
  }, {
    name: 'Carrots',
    expandable: false,
    level: 2,
    learn: 2
  }
];

/** Flat node with expandable and level information */
interface ExampleFlatNode {
  expandable: boolean;
  name: string;
  level: number;
  isExpanded?: boolean;
  learn: number
}

@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.sass']
})
export class SidenavComponent implements OnInit {

  treeControl = new FlatTreeControl<ExampleFlatNode>(
    node => node.level, node => node.expandable);

  dataSource = new ArrayDataSource(TREE_DATA);

  hasChild = (_: number, node: ExampleFlatNode) => node.expandable;

  getParentNode(node: ExampleFlatNode) {
    const nodeIndex = TREE_DATA.indexOf(node);

    for (let i = nodeIndex - 1; i >= 0; i--) {
      if (TREE_DATA[i].level === node.level - 1) {
        return TREE_DATA[i];
      }
    }

    return null;
  }

  shouldRender(node: ExampleFlatNode) {
    let parent = this.getParentNode(node);
    while (parent) {
      if (!parent.isExpanded) {
        return false;
      }
      parent = this.getParentNode(parent);
    }
    return true;
  }

  ngOnInit(): void {
  }

}
