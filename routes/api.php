<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('com-info')->group(function () {
    Route::get('/index', function () {
        return response()->json("This Is A Route Wokring", 200);
    });
});
