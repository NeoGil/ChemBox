import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable, throwError} from "rxjs";
import {ResponseHttp} from "../Models/responseHttp";
import {environment} from "../../environments/environment";
import {catchError, map} from "rxjs/operators";
import {Methods} from "../Models/methods";

@Injectable({
  providedIn: 'root'
})
export class MethodsService {

  constructor(private http: HttpClient) { }

  getMethods(): Observable<Methods[]> {

    return this.http.get<ResponseHttp>( environment.apiUrl + 'api/pub/methods').pipe(
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
