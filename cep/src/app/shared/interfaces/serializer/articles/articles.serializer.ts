import {Serializer} from '../Serializer';
import {Articles} from '../../../models/Articles';

export class ArticlesSerializer implements Serializer {
    fromJson(json: any): Articles {
        const articles = new Articles();
        articles.id = json.id;
        articles.title = json.title;
        articles.author = json.author;

        return articles;
    }

    toJson(articles: Articles): any {
        return {
            id: articles.id,
            title: articles.title,
            author: articles.author,

        };
    }
}
