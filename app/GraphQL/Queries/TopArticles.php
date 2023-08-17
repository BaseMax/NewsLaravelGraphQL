<?php

namespace App\GraphQL\Queries;

use App\Models\Rating;

final class TopArticles
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $limit = 5;
        if (isset($args["limit"]))
            $limit = $args["limit"];

        $topArticles = [];
        $ratings = Rating::orderBy("rating", "desc")->limit($limit)->get();
        foreach ($ratings as $rate) {
            $topArticles[] = $rate->article;
        }
        return $topArticles;
    }
}
