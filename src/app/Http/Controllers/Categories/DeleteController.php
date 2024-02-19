<?php

namespace App\Http\Controllers\Categories;

use App\Events\Categories\CategoriesChangedEvent;
use App\Http\Controllers\Controller;
use App\Http\Services\Categories\CategoriesService;
use App\Models\Category;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CategoriesService $service, $category_id)
    {
        $category = Category::query()->find($category_id);

        if ($response = $service->categoryExistsAndUserIsAdminCheck($category))
            return $response;

        $category->delete();

        event(new CategoriesChangedEvent());

        return response(["status" => true, "message" => "Category has been deleted"], 200);
    }
}
