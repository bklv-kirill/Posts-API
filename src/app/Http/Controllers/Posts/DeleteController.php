<?php

namespace App\Http\Controllers\Posts;

use App\Events\Posts\PostsChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Services\Posts\PostsService;
use App\Models\Post;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PostsService $service, $post_id)
    {
        $post = Post::query()->find($post_id);

        if ($response = $service->postExistsAndUserIsOwnerCheck($post))
            return $response;

        $post->deleteCategories();
        $post->delete();

        event(new PostsChangedEvent());

        return response(["status" => true, "message" => "Post has been deleted"], 200);
    }
}
