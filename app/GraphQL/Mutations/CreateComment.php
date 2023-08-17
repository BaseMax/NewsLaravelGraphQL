<?php

namespace App\GraphQL\Mutations;

use App\Models\Comment;

final class CreateComment
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $comment = Comment::create([
            "user_id"    => $args["userId"],
            "article_id" => $args["articleId"],
            "content"    => $args["content"]
        ]);
        return $comment;
    }
}
