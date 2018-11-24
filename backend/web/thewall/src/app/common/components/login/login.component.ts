import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

// @angular/material
import { MatSnackBar } from '@angular/material';

// app specific
import { AuthService } from '../../../auth.service';
import { YIIResponse } from '../../models/yii/yii-response.model';

@Component({
  selector: 'sch-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
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
    this.authService.login(this.loginForm.value).subscribe((response: YIIResponse) => {
      if (!this.authService.isLoggedIn) {
        // TODO: use some generic error handling
        let error = '';
        for (let i in response.errors) {
          error += `${i}: ${response.errors[i]}`;
        }

        this.snackBar.open(error, null, {
          verticalPosition: 'top',
          horizontalPosition: 'end',
          duration: 5000
        });

        return;
      }

      this.router.navigate([this.authService.redirectUrl]);
    });
  }
}
