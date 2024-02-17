<?php

namespace App\Http\Filters\Comments;

use App\Http\Filters\AbstrackFilter;
use Illuminate\Database\Eloquent\Builder;

class CommentsFilter extends AbstrackFilter
{
    public static function content(Builder $builder, string $content): void
    {
        $builder->where("content", "LIKE", "%{$content}%");
    }

    public static function owner_id(Builder $builder, string $owner_id): void
    {
        $builder->where("user_id", $owner_id);
    }
    public static function post_id(Builder $builder, string $post_id): void
    {
        $builder->whereHas("post", fn (Builder $builder) => $builder->where("post_id", $post_id));
    }
}
