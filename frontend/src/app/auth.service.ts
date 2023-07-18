import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  constructor() {}
  IsLoggedIn() {
    console.log(sessionStorage.getItem('login'));
    return sessionStorage.getItem('login');
  }
}
