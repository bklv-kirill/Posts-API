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
        $comment = Comment::query()->with(["user", "post"])->find($comment_id);

        return $comment ? new CommentResource($comment) : response(["date" => []], 200);
    }
}
