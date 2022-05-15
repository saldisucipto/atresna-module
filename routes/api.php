<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyInfoController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StaticController;

Route::prefix('com-info')->group(function () {
    // Company Info
    Route::get('/index', [CompanyInfoController::class, 'getCompanyInfo'])->name('companyInfo');
    Route::post('/update', [CompanyInfoController::class, 'editCompanyInfo'])->name('editCompanyInfo');
});

Route::prefix('static-content')->group(function () {
    // create static-content
    Route::get('/', [StaticController::class, 'index'])->name('showStaticContent');
    Route::match(['get', 'post'], '/info/{id}', [StaticController::class, 'update']);
    Route::post('/create', [StaticController::class, 'create'])->name('createStaticContent');
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
