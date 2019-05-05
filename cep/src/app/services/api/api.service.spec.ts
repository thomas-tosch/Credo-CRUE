import {async} from '@angular/core/testing';
import {ApiService} from './api.service';

describe('ApiService', () => {
    let service;

    const httpClient: any = {
        // mock properties here
    }

    const serializer: any = {
        // mock properties here
    }

    const entity: any = {
        // mock properties here
    }

    beforeEach(() => {
        service = new ApiService(httpClient, serializer, entity);
    });

    it('should run #create()', async () => {
        // const result = create(item);
    });

    it('should run #update()', async () => {
        // const result = update(item);
    });

    it('should run #read()', async () => {
        // const result = read(id);
    });

    it('should run #list()', async () => {
        // const result = list(queryOptions);
    });

    it('should run #delete()', async () => {
        // const result = delete(id);
    });

    it('should run #convertData()', async () => {
        // const result = convertData(data);
    });

    it('should run #getPageLinks()', async () => {
        // const result = getPageLinks(body);
    });

});
