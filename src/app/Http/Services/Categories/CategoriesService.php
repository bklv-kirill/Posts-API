<?php

namespace App\Http\Services\Categories;

use App\Http\Filters\Categories\CategoriesFilter;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoriesService
{
    public function getFilteredData(array $queryParams): Collection
    {
        if (!isset($queryParams["order_by"])) $queryParams["order_by"] = "id";

        $filters = new CategoriesFilter($queryParams);

        return Category::filter($filters);
    }
}
