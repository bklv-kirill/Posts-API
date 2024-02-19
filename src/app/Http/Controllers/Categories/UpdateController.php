<?php

namespace App\Http\Controllers\Categories;

use App\Events\Categories\CategoriesChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Services\Categories\CategoriesService;
use App\Models\Category;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, CategoriesService $service, $category_id)
    {
        $categoryData = $request->validated();

        $category = Category::query()->find($category_id);

        if ($response = $service->categoryExistsAndUserIsAdminCheck($category))
            return $response;

        $category->update($categoryData);

        if (isset($categoryData["posts"]))
            $category->updatePosts($categoryData["posts"]);

        $category->putOrUpdateCache();

        event(new CategoriesChangedEvent());

        return new CategoryResource($category);
    }
}
