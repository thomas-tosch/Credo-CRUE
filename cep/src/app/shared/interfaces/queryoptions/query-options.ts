export interface QueryBuilder {
    toQueryMap: () => Map<string, string>;
    toQueryString: () => string;
}

export class QueryOptions implements QueryBuilder {
    public pageNumber: number;
    public pageSize: number;

    constructor() {
        this.pageNumber = 1;
        this.pageSize = 20;
    }

    toQueryMap() {
        const queryMap = new Map<string, string>();
        queryMap.set('page', `${this.pageNumber}`);
        queryMap.set('itemsPerPage', `${this.pageSize}`);

        return queryMap;
    }

    toQueryString() {
        let queryString = '';
        this.toQueryMap().forEach((value: string, key: string) => {
            queryString = queryString.concat(`${key}=${value}&`);
        });

        return queryString.substring(0, queryString.length - 1);
    }
}
