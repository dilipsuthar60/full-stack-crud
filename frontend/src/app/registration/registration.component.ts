import { Component, OnInit } from '@angular/core';
import {
  Validators,
  FormGroup,
  FormControl,
  FormBuilder,
} from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-registration',
  templateUrl: './registration.component.html',
  styleUrls: ['./registration.component.css'],
})
export class RegistrationComponent implements OnInit {
  error: any;

  constructor(
    private router: Router,
    private fb: FormBuilder,
    private api: ApiService
  ) {}
  registrationform!: FormGroup;
  ngOnInit(): void {
    this.registrationform = this.fb.group({
      name: ['', [Validators.required, Validators.minLength(3)]],
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required],
    });
  }

  onSubmit(value: any,) {
    if (this.registrationform.valid) {
      console.log('form is valid');
      this.api.registrationstudent(value).subscribe(
        (res: any) => {
          console.log(res);
          if (res.status) {
            this.router.navigate(['/login']);
          } else {
            this.error = 'User Already Existed !';
            this.registrationform.reset();
          }
        },
        (error) => console.log(error)
      );
    } else {
      this.validateAllFormFiled(this.registrationform);
    }
  }
  private validateAllFormFiled(formGroup: FormGroup) {
    Object.keys(formGroup.controls).forEach((field) => {
      const control = formGroup.get(field);
      if (control instanceof FormControl) {
        control.markAsDirty({ onlySelf: true });
      } else if (control instanceof FormGroup) {
        this.validateAllFormFiled(control);
      }
    });
  }
}
