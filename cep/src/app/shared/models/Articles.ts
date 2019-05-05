import {ApiResource} from './ApiResource';

export class Articles extends ApiResource {
    title: string;
    author: string;
    thumbnail: string;
    comments: string[];
    Description: string;
    revue: string;
    date: Date;
    language: string;
    type: string;
    link: string;
    geoPoints: string[];
    project: string;
}
