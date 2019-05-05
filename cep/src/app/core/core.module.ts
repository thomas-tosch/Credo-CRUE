import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {AuthService} from './services/auth/auth.service';
import {LoaderService} from './services/loader/loader.service';
import {HTTP_INTERCEPTORS} from '@angular/common/http';
import {HttpclientInterceptor} from '../shared/interceptors/loader/httpclient.interceptor';

@NgModule({
    declarations: [],
    imports: [
        CommonModule
    ],
    providers: [AuthService,
        LoaderService,
        {provide: HTTP_INTERCEPTORS, useClass: HttpclientInterceptor, multi: true}
    ],
})
export class CoreModule {
}
