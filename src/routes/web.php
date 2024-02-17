<?php

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    $posts = \App\Models\Post::getAllFromCache("posts", ["user", "categories", "comments" => fn (Builder $builder) => $builder->with(["user"])]);
//    $categories = \App\Models\Category::getAllFromCache("categories", ["posts"]);
//    $comments = \App\Models\Comment::getAllFromCache("comments", ["user", "post"] );

    return view('instruction');
});

Route::fallback(fn () => redirect("/"));
