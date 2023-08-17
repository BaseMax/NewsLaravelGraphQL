<?php

namespace App\GraphQL\Mutations;

use App\Models\Rating;

final class RateArticle
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $rating = Rating::create([
            "user_id"     => $args["userId"],
            "article_id"  => $args["articleId"],
            "rating"      => $args["rating"]
        ]);
        return $rating;
    }
}
