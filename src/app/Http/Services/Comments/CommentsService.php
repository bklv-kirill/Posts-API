<?php

namespace App\Http\Services\Comments;

use App\Http\Filters\Comments\CommentsFilter;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentsService
{
    public function filter(array $queryParams): Collection
    {
        if (!isset($queryParams["order_by"])) $queryParams["order_by"] = "id";

        $filter = new CommentsFilter($queryParams);

        return Comment::filter($filter);
    }
}
