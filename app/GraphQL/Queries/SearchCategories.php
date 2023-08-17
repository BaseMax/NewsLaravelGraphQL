<?php

namespace App\GraphQL\Queries;

use App\Models\Category;

final class SearchCategories
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $categories = Category::where("name", "like", "%" . $args["keyword"] . "%")->get();
        return $categories;
    }
}
