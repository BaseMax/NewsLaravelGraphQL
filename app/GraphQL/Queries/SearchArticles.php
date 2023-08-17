<?php

namespace App\GraphQL\Queries;

use App\Models\Article;

final class SearchArticles
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $articles = Article::where("title", "like", "%" . $args["keyword"] . "%")->orWhere("content", "like", "%" . $args["keyword"] . "%")->get();
        return $articles;
    }
}
