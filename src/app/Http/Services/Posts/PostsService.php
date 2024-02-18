<?php

namespace App\Http\Services\Posts;

use App\Http\Filters\Posts\PostsFilter;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PostsService
{
    public function getFilteredData(array $queryParams): Collection
    {
        if (!isset($queryParams["order_by"])) $queryParams["order_by"] = "id";

        $filter = new PostsFilter($queryParams);

        return Post::filter($filter);
    }

    public function postExistsAndOwnerCheck(Post|null $post): Response|bool
    {
        if (!$post)
            return response(["status" => false, "error" => "Post not found"], 400);
        else if (!Gate::check("update-delete", $post))
            return response(["status" => false, "error" => "You are not the creator of this post"], 401);
        else return false;
    }
}
