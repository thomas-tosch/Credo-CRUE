import {ApiResource} from '../../models/ApiResource';

export interface Serializer {
    fromJson(json: any): ApiResource;

    toJson(resource: ApiResource): any;
}
