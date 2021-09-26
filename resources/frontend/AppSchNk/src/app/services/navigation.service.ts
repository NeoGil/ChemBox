import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable, throwError} from "rxjs";
import {ResponseHttp} from "../Models/responseHttp";
import {catchError , map} from "rxjs/operators";
import {Navigation} from "../Models/navigation";
import {environment} from "../../environments/environment";


@Injectable({
  providedIn: 'root'
})
export class NavigationService {

  constructor(private http: HttpClient) { }

  getNavigation(): Observable<Navigation[]> {

    return this.http.get<ResponseHttp>( environment.apiUrl + 'api/pub/menus').pipe(
      map((data) =>{
        return data.data.items
      }),
      catchError((error) => {
        console.log("Error - ", error);
        return throwError(error);
      })
    )
  }
}
