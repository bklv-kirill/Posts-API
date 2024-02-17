<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($post_id)
    {
        $post = Post::getFromCache($post_id, "posts", ["user", "categories", "comments" => fn (Builder $builder) => $builder->with(["user"])]);

        return $post ? new PostResource($post) : ["date" => []];
    }
}
