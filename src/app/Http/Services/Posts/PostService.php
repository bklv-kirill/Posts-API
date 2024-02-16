<?php

namespace App\Http\Services\Posts;

use App\Http\Filters\Posts\PostFilter;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function getFilteredData(array $queryParams): Collection
    {
        $queryFilters = new PostFilter($queryParams);

        return Post::filter($queryFilters);
    }
}
