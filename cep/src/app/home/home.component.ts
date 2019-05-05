import {Component, OnInit} from '@angular/core';
import {ArticlesApiService} from "../core/services/api/articles/articles.api.service";
import {QueryOptions} from "../shared/interfaces/queryoptions/query-options";
import {HttpClient} from "@angular/common/http";
import {Articles} from "../shared/models/Articles";

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {

    constructor(private articlesApi: ArticlesApiService) {
    }
    ngOnInit() {
        this.articlesApi.list(new QueryOptions()).subscribe(
            (data) => {
                console.log(data);
            }
        );

        this.articlesApi.read(57).subscribe(
            (data) => {
                console.log(data);
            }
        );

    }

    public executeSelectedChange = (event) => {
        console.log(event);
    }
}
