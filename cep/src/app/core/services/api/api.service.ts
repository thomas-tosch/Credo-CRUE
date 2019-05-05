import {environment} from '../../../../environments/environment';
import {map} from 'rxjs/operators';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {ApiResource} from '../../../shared/models/ApiResource';
import {Serializer} from '../../../shared/interfaces/serializer/Serializer';
import {QueryOptions} from '../../../shared/interfaces/queryoptions/query-options';


export class ApiService<T extends ApiResource> {
    protected API_URL = environment.apiEndpoint;
    constructor(
        private httpClient: HttpClient,
        private serializer: Serializer,
        private entity: string
    ) {
    }

    public create(item: T): Observable<T> {
        return this.httpClient
            .post<T>(`${this.API_URL}/${this.entity}`, this.serializer.toJson(item))
            .pipe(map(data => this.serializer.fromJson(data) as T));
    }

    public update(item: T): Observable<T> {
        return this.httpClient
            .put<T>(`${this.API_URL}/${this.entity}/${item.id}`,
                this.serializer.toJson(item))
            .pipe(map(data => this.serializer.fromJson(data) as T));
    }

    read(id: number): Observable<T> {
        return this.httpClient
            .get(`${this.API_URL}/${this.entity}/${id}`)
            .pipe(map((data: any) => this.serializer.fromJson(data) as T));
    }

    list(queryOptions: QueryOptions): Observable<T[]> {
        return this.httpClient
            .get(`${this.API_URL}/${this.entity}?${queryOptions.toQueryString()}`)
            .pipe(map((data: any) => this.convertData(data['hydra:member'])));
    }

    delete(id: number) {
        return this.httpClient
            .delete(`${this.API_URL}/${this.entity}/${id}`);
    }

    private convertData(data: any): T[] {
        return data.map(item => this.serializer.fromJson(item));
    }
}
