import { async } from '@angular/core/testing';
import {AuthService} from './auth.service';

describe('AuthService', () => {
  let service;

  const http: any = {
    // mock properties here 
  }

  beforeEach(() => {
    service = new AuthService(http);
  });

  it('should run #login()', async () => {
    // const result = login(email, password);
  });

  it('should run #setSession()', async () => {
    // const result = setSession(authResult);
  });

  it('should run #logout()', async () => {
    // const result = logout();
  });

  it('should run #isLoggedIn()', async () => {
    // const result = isLoggedIn();
  });

  it('should run #isLoggedOut()', async () => {
    // const result = isLoggedOut();
  });

  it('should run #getExpiration()', async () => {
    // const result = getExpiration();
  });

});
