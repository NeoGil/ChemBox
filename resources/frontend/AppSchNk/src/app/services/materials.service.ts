import { Injectable } from '@angular/core';
import {Navigation} from "../Models/navigation";
import {Observable, throwError} from "rxjs";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {environment} from "../../environments/environment";
import {ResponseHttp} from "../Models/responseHttp";
import {catchError, map} from "rxjs/operators";
import {Material} from "../Models/material";

@Injectable({
  providedIn: 'root'
})
export class MaterialsService {

  constructor(private http: HttpClient) { }

  getMaterials(course: string, method: string): Observable<Material[]> {

    return this.http.get<ResponseHttp>( environment.apiUrl + 'api/pub/materials/'+ course + '/' + method).pipe(
      map((data) =>{
        //   let a = []
        // data.data.items.forEach(function (item) {
        //   a.push(item);
        // })
          return data.data.items


      }),
      catchError((error) => {
        console.log("Error - ", error);
        return throwError(error);
      })
    )
  }
}
