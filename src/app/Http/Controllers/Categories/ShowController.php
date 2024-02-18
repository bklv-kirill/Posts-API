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
        $category = Category::query()->with( ["posts"])->find($category_id);

        return $category ? new CategoryResource($category) : response(["date" => []], 200);
    }
}
