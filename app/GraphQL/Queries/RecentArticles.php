<?php

namespace App\GraphQL\Queries;

use App\Models\Article;

final class RecentArticles
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $limit = 5;
        if(isset($args["limit"]))
            $limit = $args["limit"];
        $articles = Article::orderBy("created_at", "desc")->limit($limit)->get();
        return $articles;
    }
}
