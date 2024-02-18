<?php

use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
    Route::post("/register", \App\Http\Controllers\User\RegisterController::class);
    Route::post("/login", \App\Http\Controllers\User\LoginController::class);
    Route::post("/logout", \App\Http\Controllers\User\LogOutController::class)->middleware("auth:sanctum");

    Route::get("/posts", \App\Http\Controllers\Posts\IndexController::class);
    Route::get("/posts/{post_id}", \App\Http\Controllers\Posts\ShowController::class);
    Route::middleware("auth:sanctum")->group(function () {
        Route::post("/posts", \App\Http\Controllers\Posts\StoreController::class);
        Route::delete("/posts/{post_id}", \App\Http\Controllers\Posts\DeleteController::class);
        Route::patch("/posts/{post_id}", \App\Http\Controllers\Posts\UpdateController::class);
    });


    Route::get("/categories", \App\Http\Controllers\Categories\IndexController::class);
    Route::get("/categories/{category_id}", \App\Http\Controllers\Categories\ShowController::class);

    Route::get("/comments", \App\Http\Controllers\Comments\IndexController::class);
    Route::get("/comments/{comment_id}", \App\Http\Controllers\Comments\ShowController::class);
});
