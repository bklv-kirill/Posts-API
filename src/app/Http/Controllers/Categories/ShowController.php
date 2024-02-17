<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($category_id)
    {
        $category = Category::getFromCache($category_id, "categories", ["posts"]);

        return $category ? new CategoryResource($category) : ["date" => []];
    }
}
