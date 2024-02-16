<?php

namespace App\Http\Filters\Traits;

use App\Http\Filters\Posts\PostFilter;
use Illuminate\Database\Eloquent\Collection;

trait Filterable
{
    public static function filter(PostFilter $postFilter): Collection
    {
        $builder = self::query();

        foreach ($postFilter->getCallBacks() as $callBack => $value) {
            call_user_func($postFilter::class."::{$callBack}", $builder, $value);
        }

        return $builder->get();
    }
}
