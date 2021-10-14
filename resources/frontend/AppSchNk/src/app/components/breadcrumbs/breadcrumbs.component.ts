import { Component, OnInit } from '@angular/core';
import {Router} from "@angular/router";
import {Nlink} from "../../Models/nlink";
import {NlinkService} from "../../services/nlink.service";
import {Materials} from "../../Models/materials";

@Component({
  selector: 'app-breadcrumbs',
  templateUrl: './breadcrumbs.component.html',
  styleUrls: ['./breadcrumbs.component.sass']
})
export class BreadcrumbsComponent implements OnInit {

  stringUrl: string
  nlink: Nlink[]

  constructor(
    private router: Router,
    private nlinkService: NlinkService
  ) {
    this.nlink = []
  }

  ngOnInit(): void {
    const re = /\//gi;
    this.stringUrl = this.router.url
    this.getMaterials(this.stringUrl.replace(re, "&8&"))
  }

  getMaterials(nlink_str: string): void {
    
    this.nlinkService.getNlink(nlink_str).subscribe((data: Nlink[]) => {
        this.nlink = data;
        console.log(this.nlink)
      }
    );
  }

}
