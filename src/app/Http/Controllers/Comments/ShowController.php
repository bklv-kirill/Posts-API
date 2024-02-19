<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($comment_id)
    {
        $comment = Comment::getFromCache("comments", $comment_id);

        return $comment ? new CommentResource($comment) : response(["status" => false, "error" => "Comment not found"], 400);
    }
}
