import {ChangeDetectorRef, Component} from '@angular/core';
import { BreakpointObserver, Breakpoints } from '@angular/cdk/layout';
import { Observable } from 'rxjs';
import { map, shareReplay } from 'rxjs/operators';
import {Router} from "@angular/router";
import {Navigation} from "../../../Models/navigation";
import {NavigationService} from "../../../services/navigation.service";
import {LoaderService} from "../../../services/loader/loader.service";

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.sass']
})
export class NavComponent {

  navigation: Navigation[]

  isHandset$: Observable<boolean> = this.breakpointObserver.observe(Breakpoints.Handset)
    .pipe(

      map(result => result.matches),
      shareReplay()
    );

  constructor(
    private breakpointObserver: BreakpointObserver,
    private router: Router,
    private navigationService: NavigationService,
    public loaderService: LoaderService,
    private cdr: ChangeDetectorRef
  ) {}

  ngOnInit(): void {
    this.getMenu();
  }

  getMenu(): void {
    this.navigationService.getNavigation().subscribe(
      (data: Navigation[]) => {
        this.navigation = data;
      }
    );
  }


  ngAfterViewChecked(){
    this.cdr.detectChanges();
  }


}
