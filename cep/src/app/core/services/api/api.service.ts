import {Injectable} from '@angular/core';
import {environment} from '../../../../environments/environment';
import {map} from 'rxjs/operators';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {ApiResource} from '../../../shared/models/ApiResource';
import {Serializer} from '../../../shared/interfaces/serializer/Serializer';
import {QueryOptions} from '../../../shared/interfaces/queryoptions/query-options';

const API_URL = environment.apiEndpoint;

export class ApiService<T extends ApiResource> {

    public first = '';
    public prev = '';
    public next = '';
    public last = '';

    constructor(
        private httpClient: HttpClient,
        private serializer: Serializer,
        private entity: string
    ) {
    }

    public create(item: T): Observable<T> {
        return this.httpClient
            .post<T>(`${API_URL}/${this.entity}`, this.serializer.toJson(item))
            .pipe(map(data => this.serializer.fromJson(data) as T));
    }

    public update(item: T): Observable<T> {
        return this.httpClient
            .put<T>(`${API_URL}/${this.entity}/${item.id}`,
                this.serializer.toJson(item))
            .pipe(map(data => this.serializer.fromJson(data) as T));
    }

    read(id: number): Observable<T> {
        return this.httpClient
            .get(`${API_URL}/${this.entity}/${id}`)
            .pipe(map((data: any) => this.serializer.fromJson(data) as T));
    }

    list(queryOptions: QueryOptions): Observable<T[]> {
        return this.httpClient
            .get(`${API_URL}/${this.entity}?${queryOptions.toQueryString()}`)
            .pipe(map((data: any) => this.convertData(data.items)));
    }

    delete(id: number) {
        return this.httpClient
            .delete(`${API_URL}/${this.entity}/${id}`);
    }

    private convertData(data: any): T[] {
        return data.map(item => this.serializer.fromJson(item));
    }

    private getPageLinks(body) {
        if (body.length === 0) {
            return;
        }
        if (body['hydra:totalItems'] < 1) {
            return;
        }
        this.first = body['hydra:view']['hydra:first'];
        this.last = body['hydra:view']['hydra:last'];
        this.next = body['hydra:view']['hydra:next'];
        this.prev = body['hydra:view']['hydra:previous'];
    }
}
