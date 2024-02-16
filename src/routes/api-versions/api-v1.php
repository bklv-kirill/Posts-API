<?php

use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
   Route::get("/test", function () {
       return ["test" => "test"];
   });
});
