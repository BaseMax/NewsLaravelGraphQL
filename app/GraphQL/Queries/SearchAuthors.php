<?php

namespace App\GraphQL\Queries;

use App\Models\Author;

final class SearchAuthors
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $authors = Author::where("name", "like", "%" . $args["keyword"] . "%")->orWhere("bio", "like", "%" . $args["keyword"] . "%")->get();
        return $authors;
    }
}
