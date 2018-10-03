import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';
import { MatSnackBar } from '@angular/material';

@Component({
  selector: 'sch-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  loginForm: FormGroup;

  constructor(private authService: AuthService, private snackBar: MatSnackBar, private router: Router) {}

  ngOnInit() {
    this.loginForm = new FormGroup({
      login: new FormControl('', [Validators.required]),
      password: new FormControl('', [Validators.required])
    });
  }

  onSubmit() {
    this.snackBar.open('Logging in, please stand by, blah blah blah blah', null, {
      verticalPosition: 'top',
      horizontalPosition: 'end',
      duration: 2000,
    });

    this.authService.login().subscribe(val => {
      if (!this.authService.isLoggedIn) {
        return console.error('error on login');
      }

      this.router.navigate([this.authService.redirectUrl || '/']);
    });
  }
}
