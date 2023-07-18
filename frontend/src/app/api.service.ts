import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root',
})
export class ApiService {
  baseUrl = 'http://localhost:8080/';
  constructor(private http: HttpClient) {}
  getstudentlist() {
    return this.http.get(this.baseUrl + 'read.php');
  }
  createstudent(formdata: any) {
    return this.http.post(this.baseUrl + 'create.php', formdata);
  }
  deletestudent(id: any) {
    return this.http.delete(this.baseUrl + 'delete.php', {
      params: { id: id },
    });
  }
  registrationstudent(studentdata: any) {
    return this.http.post(this.baseUrl + 'sign.php', studentdata);
  }
  loginstudent(loginstudentdata: any) {
    return this.http.post(this.baseUrl + 'login.php', loginstudentdata);
  }
  singlestudent(id: any) {
    return this.http.get(this.baseUrl + 'singleuser.php', {
      params: { id: id },
    });
  }
  updatestudent(formdata: any) {
    return this.http.post(this.baseUrl + 'update.php', formdata);
  }
  logout()
  {
    return this.http.get(this.baseUrl + 'logout.php');
  }
}
