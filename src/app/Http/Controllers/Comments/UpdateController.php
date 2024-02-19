<?php

namespace App\Http\Controllers\Comments;

use App\Events\CommentsChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\UpdateRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Services\Comments\CommentsService;
use App\Models\Comment;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, CommentsService $service, $comment_id)
    {
        $commentDate = $request->validated();

        $comment = Comment::query()->find($comment_id);

        if ($response = $service->commentExistsAndUserIsOwnerCheck($comment))
            return $response;

        $comment->update($commentDate);

        $comment->putOrUpdateCache();

        event(new CommentsChangedEvent());

        return new CommentResource($comment);
    }
}
