<?php

use Illuminate\Support\Facades\Route;

// Parsing All Route to Vuejs Router
Route::get('/{catchall?}', function () {
    return response()->view('welcome');
})->where('catchall', '^(?!api).*$');
