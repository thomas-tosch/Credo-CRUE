import {Injectable} from '@angular/core';
import {HttpEvent, HttpHandler, HttpInterceptor, HttpRequest} from '@angular/common/http';
import {Observable} from 'rxjs';
import {finalize} from 'rxjs/operators';
import {LoaderService} from '../../../core/services/loader/loader.service';
import {AuthService} from '../../../core/services/auth/auth.service';

@Injectable()
export class HttpclientInterceptor implements HttpclientInterceptor {
  constructor(public loaderService: LoaderService, public authService: AuthService) {
  }

  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    this.loaderService.show();
    if (this.authService.isLoggedIn()) {
      const jwt = localStorage.getItem('id_token');
      if (!!jwt) {
        req = req.clone({
          setHeaders: {
            Authorization: `Bearer ${jwt}`
          }
        });
      }
    }
    return next.handle(req).pipe(
          finalize(() => this.loaderService.hide())
      );
    }
  }
