<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyInfoController;
use App\Http\Controllers\API\UserController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('com-info')->group(function () {
    // Company Info
    Route::get('/index', [CompanyInfoController::class, 'getCompanyInfo'])->name('companyInfo');
    Route::post('/update', [CompanyInfoController::class, 'editCompanyInfo'])->name('editCompanyInfo');
});

Route::prefix('user-info')->group(function () {
    // User Info
    Route::get('/users', [UserController::class, 'index'])->name('userInfo');
    Route::post('/create', [UserController::class, 'create'])->name('createUser');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('userShow');

});
