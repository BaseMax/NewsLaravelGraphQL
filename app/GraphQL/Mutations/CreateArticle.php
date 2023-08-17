<?php

namespace App\GraphQL\Mutations;

use App\Models\Article;

final class CreateArticle
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $article = Article::create([
            "title"       => $args["title"],
            "content"     => $args["content"],
            "author_id"   => $args["authorId"],
            "category_id" => $args["categoryId"]
        ]);

        return $article;
    }
}
