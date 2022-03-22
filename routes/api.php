<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyInfoController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('com-info')->group(function () {
    Route::get('/index', [CompanyInfoController::class, 'getCompanyInfo'])->name('companyInfo');
    Route::put('/update', [CompanyInfoController::class, 'editCompanyInfo'])->name('editCompanyInfo');
});
