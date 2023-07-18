import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-logout',
  templateUrl: './logout.component.html',
  styleUrls: ['./logout.component.css'],
})
export class LogoutComponent {
  constructor(private router: Router, private api: ApiService) {
    api.logout().subscribe((res: any) => {
      console.log(res);
    });
    sessionStorage.setItem('login', 'false');
    console.log(sessionStorage.getItem('login'));
  }
  onSubmit() {
    this.router.navigate(['/logout']);
  }
}
