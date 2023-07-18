import { Component } from '@angular/core';
import { Validators, FormGroup, FormControl } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-add-user',
  templateUrl: './add-user.component.html',
  styleUrls: ['./add-user.component.css'],
})
export class AddUserComponent {
  constructor(private api: ApiService, private router: Router) {}
  adduserform = new FormGroup({
    name: new FormControl('', [Validators.required, Validators.minLength(3)]),
    email: new FormControl('', [Validators.required, Validators.email]),
    password: new FormControl('', [Validators.required]),
    subject: new FormControl('hindi', [Validators.required]),
    gender: new FormControl('', [Validators.required]),
    message: new FormControl('', [Validators.required]),
  });
  onsubmit(value: any) {
    // console.log(value);
    
    this.api.createstudent(value).subscribe((res: any) => {
      console.log(res);
      this.router.navigate(['/home']);
    });
  }
  get name() {
    return this.adduserform.get('name');
  }
  get email() {
    return this.adduserform.get('email');
  }
  get gender() {
    return this.adduserform.get('gender');
  }
  get message() {
    return this.adduserform.get('message');
  }
  get password() {
    return this.adduserform.get('password');
  }
  get subject() {
    return this.adduserform.get('subject');
  }
}
