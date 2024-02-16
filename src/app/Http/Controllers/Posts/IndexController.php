<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;
use App\Http\Resources\Post\PostResource;
use App\Http\Services\Posts\PostService;
use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PostRequest $request, PostService $service)
    {
        $queryParams = $request->validated();

        if (array_count_values($queryParams)) $posts = $service->getFilteredData($queryParams);
        else $posts = Post::getAllFromCache();

        return PostResource::collection($posts);
    }
}
