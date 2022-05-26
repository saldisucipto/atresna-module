<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyInfoController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StaticController;
use App\Http\Controllers\API\WhyChooseUsController;
use App\Http\Controllers\API\NewsController;

Route::prefix('com-info')->group(function () {
    // Company Info
    Route::get('/index', [CompanyInfoController::class, 'getCompanyInfo'])->name('companyInfo');
    Route::post('/update', [CompanyInfoController::class, 'editCompanyInfo'])->name('editCompanyInfo');
});

Route::prefix('static-content')->group(function () {
    // create static-content
    Route::get('/', [StaticController::class, 'index'])->name('showStaticContent');
    Route::match(['get', 'post'], '/info/{id}', [StaticController::class, 'update']);
    Route::delete('/delete/{id}', [StaticController::class, 'delete'])->name('deleteStaticContent');
    Route::post('/create', [StaticController::class, 'create'])->name('createStaticContent');
});

Route::prefix('news-artikel')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::post('/create', [NewsController::class, 'create'])->name('createNews');
});


Route::prefix('why-choose-us')->group(function () {
    Route::get('/', [WhyChooseUsController::class, 'index'])->name('showWhyChooseUs');
    Route::post('/create', [WhyChooseUsController::class, 'create'])->name('createWhyChooseUs');
    Route::match(['get', 'post'], '/{slugs}', [WhyChooseUsController::class, 'update']);
    Route::delete('/{slugs}/delete', [WhyChooseUsController::class, 'delete'])->name('deleteWhyChooseUs');
});

Route::prefix('user-info')->group(function () {
    // User Info
    Route::get('/users', [UserController::class, 'index'])->name('userInfo');
    Route::post('/create', [UserController::class, 'create'])->name('createUser');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::match(['get', 'DELETE'], '/user/{id}', [UserController::class, 'show'])->name('userShow');
});


// login
Route::post('user-login', [AuthController::class, 'login'])->name('loginUser');
