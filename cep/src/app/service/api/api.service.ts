import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment';

const API_URL = environment.apiEndpoint;

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor() { }
}
