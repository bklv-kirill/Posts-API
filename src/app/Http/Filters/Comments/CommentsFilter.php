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
}
