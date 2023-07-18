import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-edit-user',
  templateUrl: './edit-user.component.html',
  styleUrls: ['./edit-user.component.css'],
})
export class EditUserComponent implements OnInit {
  id: any;
  studentdetail: any;
  constructor(
    private router: Router,
    private activeroutes: ActivatedRoute,
    private api: ApiService
  ) {}
  ngOnInit(): void {
    this.id = this.activeroutes.snapshot.paramMap.get('id');
    this.api.singlestudent(this.id).subscribe((res: any) => {
      this.studentdetail = res.data;
      console.log(this.studentdetail);
    });
  }
  onSubmit() { 
    this.api.updatestudent(this.studentdetail).subscribe((res: any) => {
      this.router.navigate(['/home']);
    });
  }
}
