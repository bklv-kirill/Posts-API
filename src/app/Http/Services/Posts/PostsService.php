<?php

namespace App\Http\Services\Posts;

use App\Http\Filters\Posts\PostsFilter;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostsService
{
    public function getFilteredData(array $queryParams): Collection
    {
        if (!isset($queryParams["order_by"])) $queryParams["order_by"] = "id";

        $filters = new PostsFilter($queryParams);

        return Post::filter($filters);
    }
}
