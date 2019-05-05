import {Component} from '@angular/core';

export interface Tile {
  color: string;
  cols: number;
  rows: number;
  text: string;
}

@Component({
  selector: 'app-grid-presse',
  styleUrls: ['grid-presse.component.scss'],
  templateUrl: 'grid-presse.component.html',
})
export class GridPresse {
  tiles: Tile[] = [
    {text: 'One', cols: 6, rows: 1, color: 'lightblue'},
    {text: 'Two', cols: 3, rows: 1, color: 'lightgreen'},
    {text: 'Three', cols: 3, rows: 1, color: 'lightpink'},
    {text: 'Four', cols: 3, rows: 1, color: 'lightpink'},
    {text: 'Five', cols: 3, rows: 1, color: 'lightpink'},
    {text: 'Six', cols: 3, rows: 1, color: 'lightpink'},
    {text: 'Seven', cols: 3, rows: 1, color: 'lightpink'},
  ];
}