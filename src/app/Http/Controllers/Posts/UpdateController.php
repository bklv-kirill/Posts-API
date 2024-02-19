<?php

namespace App\Http\Controllers\Posts;

use App\Events\Posts\PostsChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Http\Services\Posts\PostsService;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, PostsService $service, $post_id)
    {
        $postDate = $request->validated();
        $post = Post::query()->find($post_id);

        if ($response = $service->postExistsAndUserIsOwnerCheck($post))
            return $response;

        $post->update($postDate);
        if (isset($postDate["categories"]))
            $post->updateCategories($postDate["categories"]);

        $post->putOrUpdateCache();

        event(new PostsChangedEvent());

        return new PostResource($post);
    }
}
