<?php

namespace App\Http\Controllers\Comments;

use App\Events\CommentsChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Services\Comments\CommentsService;
use App\Models\Comment;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CommentsService $service, $comment_id)
    {
        $comment = Comment::query()->find($comment_id);

        if ($response = $service->commentExistsAndUserIsOwnerCheck($comment))
            return $response;

        $comment->delete();

        event(new CommentsChangedEvent());

        return response(["status" => true, "message" => "Comment has been deleted"], 200);
    }
}
