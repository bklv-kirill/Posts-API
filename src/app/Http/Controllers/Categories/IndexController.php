<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\IndexRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Services\Categories\CategoriesService;
use App\Models\Category;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $request, CategoriesService $service)
    {
        $queryParams = $request->validated();

        if (count($queryParams)) $categories = $service->getFilteredData($queryParams);
        else $categories = Category::getAllFromCache("categories", ["posts"]);

        return CategoryResource::collection($categories);
    }
}
