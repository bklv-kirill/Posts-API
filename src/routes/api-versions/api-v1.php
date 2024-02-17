<?php

use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
   Route::get("/posts", \App\Http\Controllers\Posts\IndexController::class);
   Route::get("/categories", \App\Http\Controllers\Categories\IndexController::class);
   Route::get("/comments", \App\Http\Controllers\Comments\IndexController::class);
});
