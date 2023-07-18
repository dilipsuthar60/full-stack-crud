import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent implements OnInit {
  studentlist: any;
  constructor(private router: Router,private api: ApiService) {}
  ngOnInit(): void {
    this.liststudent();
  }
  liststudent() {
    this.api
      .getstudentlist()
      .subscribe((res: any) => (this.studentlist = res['data']));
  }
  editstudent(id: any) {
    let permission = confirm('are you want to edit student');
    if (permission === true) {
      this.router.navigate(['edit', id]);
      console.log('edit student id is ' + id);
    }
  }
  deletestudent(id: any) {
    let permission = confirm('are you want to delete student');
    if (permission === true) {
      this.api.deletestudent(id).subscribe((res: any) => {
        console.log(res);
        this.liststudent();
      });
    }
  }
}
