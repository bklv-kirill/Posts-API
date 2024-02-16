<?php

use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
   Route::get("/posts", \App\Http\Controllers\Posts\IndexController::class);
});
