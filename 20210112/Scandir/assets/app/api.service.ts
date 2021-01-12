import { Injectable } from '@angular/core';
import {Http} from '@angular/http';

@Injectable({
  providedIn: 'root'
})

export class ApiService {
  
  constructor(private http: Http) { }

  getAllPeople(){
    return this.http.get('https://swapi.dev/api/people', 
    {})
  }

  getAllVehicles(){
    return this.http.get('https://swapi.dev/api/vehicles',{})
  }

  getAllPlanets(){
    return this.http.get('https://swapi.dev/api/planets',{})
  }

  getOneElement(Element){
    return this.http.get(Element,{})
  }

}
