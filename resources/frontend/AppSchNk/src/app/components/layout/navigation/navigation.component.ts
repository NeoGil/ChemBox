import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Navigation} from "../../../Models/navigation";
import {LoaderService} from "../../../services/loader/loader.service";
import {BreakpointObserver} from "@angular/cdk/layout";

@Component({
  selector: 'app-navigation',
  templateUrl: './navigation.component.html',
  styleUrls: ['./navigation.component.sass']
})
export class NavigationComponent implements OnInit {

  @Input() navigation: Navigation[];
  @Output() sidenavToggle = new EventEmitter();

  constructor(
    public loaderService:LoaderService
  ) { }

  ngOnInit(): void {
  }

  onToggleSidenav() {
    this.sidenavToggle.emit();
  }

}
