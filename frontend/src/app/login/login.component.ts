import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import {
  Validators,
  FormGroup,
  FormControl,
  FormBuilder,
} from '@angular/forms';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})
export class LoginComponent implements OnInit {
  error: any;
  constructor(
    private router: Router,
    private api: ApiService,
    private fb: FormBuilder
  ) {}
  loginform!: FormGroup;
  ngOnInit(): void {
    this.loginform = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required],
    });
  }
  onSubmit(value: any) {
    if (this.loginform.valid) {
      this.api.loginstudent(value).subscribe((res: any) => {
        console.log(res);
        if (res.status) {
          console.log('res status');
          sessionStorage.setItem('login', 'true');
          console.log(sessionStorage.getItem('login'));

          this.router.navigate(['/home']);
        } else {
          this.error = 'Invalid';
          this.loginform.reset();
        }
      });
    } else {
      this.error = 'Invalid';
    }
  }
}
