<?php

namespace App\Http\Filters\Traits;

use App\Http\Filters\Categories\CategoriesFilter;
use App\Http\Filters\Comments\CommentsFilter;
use App\Http\Filters\Posts\PostsFilter;
use Illuminate\Database\Eloquent\Collection;

trait Filterable
{
    public static function filter(PostsFilter | CategoriesFilter | CommentsFilter $filter): Collection
    {
        $builder = self::query();

        foreach ($filter->getCallBacks() as $callBack => $value) {
            call_user_func($filter::class."::{$callBack}", $builder, $value);
        }

        return $builder->get();
    }
}
