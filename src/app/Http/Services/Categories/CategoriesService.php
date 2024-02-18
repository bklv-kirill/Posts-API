<?php

namespace App\Http\Services\Categories;

use App\Http\Filters\Categories\CategoriesFilter;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class CategoriesService
{
    public function getFilteredData(array $queryParams): Collection
    {
        if (!isset($queryParams["order_by"])) $queryParams["order_by"] = "id";

        $filter = new CategoriesFilter($queryParams);

        return Category::filter($filter);
    }

    public function categoryExistsAndIUserIsAdminCheck(Category|null $category): Response|bool
    {
        if (!$category)
            return response(["status" => false, "error" => "Category not found"], 400);
        else if (!auth()->user()->is_admin)
            return response(["status" => false, "message" => "You can't do this"], 401);
        else return false;
    }
}
