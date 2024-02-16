<?php

namespace App\Http\Filters\Posts;

use App\Http\Filters\AbstrackFilter;
use Illuminate\Database\Eloquent\Builder;

class PostsFilter extends AbstrackFilter
{
    public static function title(Builder $builder, string $title): void
    {
        $builder->where("title", "LIKE", "%{$title}%");
    }

    public static function content(Builder $builder, string $content): void
    {
        $builder->where("content", "LIKE", "%{$content}%");
    }

}
