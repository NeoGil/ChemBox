import { Injectable } from '@angular/core';
import {Observable, throwError} from "rxjs";
import {HttpClient} from "@angular/common/http";
import {environment} from "../../environments/environment";
import {ResponseHttp} from "../Models/responseHttp";
import {catchError, map} from "rxjs/operators";
import {Materials} from "../Models/materials";
import {Material} from "../Models/material";

@Injectable({
  providedIn: 'root'
})
export class MaterialsService {

  constructor(private http: HttpClient) { }

  getMaterials(course: string, method: string): Observable<Materials> {

    return this.http.get<ResponseHttp>( environment.apiUrl + 'api/pub/materials/'+ course + '/' + method).pipe(
      map((data) =>{
          return data.data.item
      }),
      catchError((error) => {
        console.log("Error - ", error);
        return throwError(error);
      })
    )
  }

  storeMaterials(course: string, method: string, alias: string): Observable<Material> {

    return this.http.get<ResponseHttp>( environment.apiUrl + 'api/pub/materials/'+ course + '/' + method + '/' + alias).pipe(
      map((data) =>{
        return data.data.item
      }),
      catchError((error) => {
        console.log("Error - ", error);
        return throwError(error);
      })
    )
  }
}
