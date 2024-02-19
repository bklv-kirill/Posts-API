<?php

namespace App\Http\Services\Comments;

use App\Http\Filters\Comments\CommentsFilter;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Gate;

class CommentsService
{
    public function getFilteredData(array $queryParams): Collection
    {
        if (!isset($queryParams["order_by"])) $queryParams["order_by"] = "id";

        $filter = new CommentsFilter($queryParams);

        return Comment::filter($filter);
    }

    public function commentExistsAndUserIsOwnerCheck(Comment|null $comment)
    {
        if (!$comment)
            return response(["status" => false, "error" => "Comment not found"], 400);
        else if (!Gate::check("update-delete", $comment))
            return response(["status" => false, "error" => "You are not the creator of this comment"], 401);
        else return false;
    }
}
