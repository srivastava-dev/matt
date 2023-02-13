import { Component,OnInit } from '@angular/core';
import { ServiceService } from '../service.service';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  constructor(private crudService: ServiceService) { }
  username: any;
  password: any;
  login(){
    console.log(`Email: ${this.username} Password: ${this.password}`);
    console.log(this.crudService.showTasks);
  }
}
