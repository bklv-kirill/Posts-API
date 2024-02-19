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
        $post = Post::getFromCache("posts", $post_id);

        return $post ? new PostResource($post) : response(["status" => false, "error" => "Post not found"], 400);
    }
}
