import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

// app specific
import { AuthService } from '../../../auth.service';
import { YIIResponse } from '../../models/yii/yii-response.model';
import { YiiCrudService } from '../../services/crud/yii-crud/yii-crud.service';
import { ErrorsService } from '../../services/yii/errors.service';

@Component({
  selector: 'sch-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  loginForm: FormGroup;

  constructor(
    private authService: AuthService,
    private router: Router,
    private errorsService: ErrorsService
  ) {}

  ngOnInit() {
    this.loginForm = new FormGroup({
      login: new FormControl('', [Validators.required]),
      password: new FormControl('', [Validators.required])
    });
  }

  onSubmit() {
    this.authService
      .login(this.loginForm.value)
      .subscribe((response: YIIResponse) => {
        if (!this.authService.isLoggedIn) {
          return this.errorsService.showServerErrors(response);
        }

        this.router.navigate([this.authService.redirectUrl]);
      });
  }
}
