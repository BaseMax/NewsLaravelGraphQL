<?php

namespace App\GraphQL\Queries;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

final class MostCommented
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $limit = 5;
        if (isset($args["limit"]))
            $limit = $args["limit"];

        $articles = Article::select('articles.id', 'articles.title', DB::raw('COUNT(comments.article_id) as comment_count'))
            ->leftJoin('comments', 'articles.id', '=', 'comments.article_id')
            ->groupBy('articles.id', 'articles.title')
            ->orderByDesc('comment_count')
            ->limit($limit)
            ->get();

        return $articles;
    }
}
