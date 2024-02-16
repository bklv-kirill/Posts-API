<?php

namespace App\Http\Filters\Categories;

use App\Http\Filters\AbstrackFilter;
use Illuminate\Database\Eloquent\Builder;

class CategoriesFilter extends AbstrackFilter
{
    public static function name(Builder $builder, string $name): void
    {
        $builder->where("name", "LIKE", "%{$name}%");
    }
}
