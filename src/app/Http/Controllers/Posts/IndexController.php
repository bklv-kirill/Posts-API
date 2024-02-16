<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\IndexRequest;
use App\Http\Resources\Post\PostResource;
use App\Http\Services\Posts\PostsService;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $request, PostsService $service)
    {
        $queryParams = $request->validated();

        if (count($queryParams)) $posts = $service->getFilteredData($queryParams);
        else $posts = Post::getAllFromCache("posts", ["user", "categories", "comments" => fn (Builder $builder) => $builder->with(["user"])]);

        return PostResource::collection($posts);
    }
}
