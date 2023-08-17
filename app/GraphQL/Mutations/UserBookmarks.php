<?php

namespace App\GraphQL\Mutations;

use App\Models\Bookmark;

final class UserBookmarks
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookmarks = Bookmark::where("user_id", $args["userId"])->get();
        return $bookmarks;
    }
}
