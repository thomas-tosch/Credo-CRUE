import { async } from '@angular/core/testing';
import {AuthGuard} from './auth-guard.service';

describe('AuthGuard', () => {
  let service;

  const authService: any = {
    // mock properties here 
  }

  const router: any = {
    // mock properties here 
  }

  beforeEach(() => {
    service = new AuthGuard(authService,router);
  });

  it('should run #canActivate()', async () => {
    // const result = canActivate(next, state);
  });

});
