<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\IndexRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Services\Comments\CommentsService;
use App\Models\Comment;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $request, CommentsService $service)
    {
        $queryParams = $request->validated();

        if (count($queryParams)) $comments = $service->getFilteredData($queryParams);
        else $comments = Comment::getAllFromCache("comments");

        return CommentResource::collection($comments);
    }
}
