// tslint:disable
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { Injectable, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { isPlatformBrowser } from '@angular/common';
import { By } from '@angular/platform-browser';
// import { Observable } from 'rxjs/Observable';
// import 'rxjs/add/observable/of';
// import 'rxjs/add/observable/throw';

import {Component, Directive} from '@angular/core';
import {LoginComponent} from './login.component';
import {FormBuilder, ReactiveFormsModule} from '@angular/forms';
import {AuthService} from '../../../core/services/auth/auth.service';
import {Router} from '@angular/router';
import {HttpClientModule} from "@angular/common/http";

@Injectable()
class MockAuthService { }

@Injectable()
class MockRouter { navigate = jest.fn(); }

describe('LoginComponent', () => {
  let fixture;
  let component;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [
        ReactiveFormsModule,
          HttpClientModule
      ],
      declarations: [
        LoginComponent
      ],
      providers: [
        FormBuilder,
        {provide: AuthService, useClass: MockAuthService},
        {provide: Router, useClass: MockRouter},
      ],
      schemas: [ CUSTOM_ELEMENTS_SCHEMA ]
    }).compileComponents();
    fixture = TestBed.createComponent(LoginComponent);
    component = fixture.debugElement.componentInstance;
  });

  it('should create a component', async () => {
    expect(component).toBeTruthy();
  });

  it('should run #login()', async () => {
    // const result = component.login();
  });

});
