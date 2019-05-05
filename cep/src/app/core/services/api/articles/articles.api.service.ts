import {HttpClient} from '@angular/common/http';
import {ApiService} from '../api.service';
import {Articles} from '../../../../shared/models/Articles';
import {ArticlesSerializer} from '../../../../shared/interfaces/serializer/articles/articles.serializer';
import {Injectable} from '@angular/core';

@Injectable()
export class ArticlesApiService extends ApiService<Articles> {
    constructor(httpClient: HttpClient) {
        super(
            httpClient,
            new ArticlesSerializer(),
            'articles',
            );
    }
}
