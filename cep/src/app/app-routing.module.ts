import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { CommonModule } from '@angular/common';

const routes: Routes = [
  {path: 'home', component: AppComponent},
  {path: '', redirectTo: '/home', pathMatch: 'full'}
  
];

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forRoot(routes)],
  exports: [RouterModule],
  
  declarations: []
})
export class AppRoutingModule { }
