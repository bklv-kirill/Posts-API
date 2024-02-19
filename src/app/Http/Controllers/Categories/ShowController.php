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
        $category = Category::getFromCache("categories", $category_id);

        return $category ? new CategoryResource($category) : response(["status" => false, "error" => "Category not found"], 400);
    }
}
