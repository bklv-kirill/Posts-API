<?php

namespace App\Http\Controllers\Comments;

use App\Events\CommentsChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\StoreRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $commentData = $request->validated();

        $comment = Comment::query()->create(array_merge(["user_id" => auth()->user()->id], $commentData));

        $comment->putOrUpdateCache();

        event(new CommentsChangedEvent());

        return new CommentResource($comment);
    }
}
