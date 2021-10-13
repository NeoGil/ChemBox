import { Component, OnInit } from '@angular/core';
import {Router} from "@angular/router";

@Component({
  selector: 'app-breadcrumbs',
  templateUrl: './breadcrumbs.component.html',
  styleUrls: ['./breadcrumbs.component.sass']
})
export class BreadcrumbsComponent implements OnInit {

  stringUrl: string

  constructor(
    private router: Router
  ) { }

  ngOnInit(): void {
    const re = /\//gi;
    this.stringUrl = this.router.url
    console.log(this.stringUrl.replace(re, "&8&"))

    // for (let i = 0; i < this.stringUrl.length; i++) {
    //   if(this.stringUrl[i] != "") {
    //     this.stringUrl[i+1] = this.stringUrl[i].toString() + '/' + this.stringUrl[i+1].toString()
    //     this.urls[this.urls.length] = this.stringUrl[i]
    //   }
    // }

  }

}
