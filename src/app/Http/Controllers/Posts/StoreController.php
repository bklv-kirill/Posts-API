<?php

namespace App\Http\Controllers\Posts;

use App\Events\Posts\PostsChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $postData = $request->validated();

        $post = Post::query()->create(array_merge(["user_id" => auth()->user()->id],$postData));

        if (isset($postData["categories"]))
            $post->addCategories($postData["categories"]);

        $post->putOrUpdateCache();

        event(new PostsChangedEvent());

        return new PostResource($post);
    }
}
