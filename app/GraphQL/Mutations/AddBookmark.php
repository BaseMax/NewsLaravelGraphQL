<?php

namespace App\GraphQL\Mutations;

use App\Models\Bookmark;

final class AddBookmark
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookmark = Bookmark::create([
            "user_id"    => $args["userId"],
            "article_id" => $args["articleId"]
        ]);
        return $bookmark;
    }
}
