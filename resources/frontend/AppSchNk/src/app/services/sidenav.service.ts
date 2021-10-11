import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable, throwError} from "rxjs";
import {ResponseHttp} from "../Models/responseHttp";
import {environment} from "../../environments/environment";
import {catchError, map} from "rxjs/operators";
import {Side_cm} from "../Models/side_cm";

@Injectable({
  providedIn: 'root'
})
export class SidenavService {

  constructor(private http: HttpClient) { }

  getCourses_Methods(): Observable<Side_cm[]> {

    return this.http.get<ResponseHttp>( environment.apiUrl + 'api/pub/methods/c&m').pipe(
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
