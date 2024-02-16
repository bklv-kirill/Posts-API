<?php

namespace App\Http\Filters\Traits;

use App\Http\Filters\Categories\CategoriesFilter;
use App\Http\Filters\Posts\PostsFilter;
use Illuminate\Database\Eloquent\Collection;

trait Filterable
{
    public static function filter(PostsFilter | CategoriesFilter $filters): Collection
    {
        $builder = self::query();

        foreach ($filters->getCallBacks() as $callBack => $value) {
            call_user_func($filters::class."::{$callBack}", $builder, $value);
        }

        return $builder->get();
    }
}
