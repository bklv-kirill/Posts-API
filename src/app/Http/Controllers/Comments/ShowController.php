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
        $comment = Comment::getFromCache($comment_id, "comments", ["user", "post"]);

        return $comment ? new CommentResource($comment) : ["date" => []];
    }
}
