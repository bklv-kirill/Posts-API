<?php

namespace App\Http\Controllers\Categories;

use App\Events\Categories\CategoriesChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $categoryData = $request->validated();

        if (!auth()->user()->is_admin)
            return response(["status" => false, "message" => "You can't do this"], 401);

        $category = Category::query()->create($categoryData);

        if (isset($categoryData["posts"]))
            $category->addPosts($categoryData["posts"]);

        $category->putOrUpdateCache();

        event(new CategoriesChangedEvent());

        return new CategoryResource($category);
    }
}
