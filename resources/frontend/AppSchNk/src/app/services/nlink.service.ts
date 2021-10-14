import { Injectable } from '@angular/core';
import {Observable, throwError} from "rxjs";
import {Materials} from "../Models/materials";
import {ResponseHttp} from "../Models/responseHttp";
import {environment} from "../../environments/environment";
import {catchError, map} from "rxjs/operators";
import {HttpClient} from "@angular/common/http";
import {Nlink} from "../Models/nlink";

@Injectable({
  providedIn: 'root'
})
export class NlinkService {

  constructor(private http: HttpClient) { }

  getNlink(nlink: string): Observable<Nlink[]> {

    return this.http.get<ResponseHttp>( environment.apiUrl + 'api/pub/courses/nlink/'+ nlink).pipe(
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
