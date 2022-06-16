<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyInfoController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StaticController;
use App\Http\Controllers\API\WhyChooseUsController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\ServisProductController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\OurClientController;




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


Route::prefix('servis')->group(function(){
    Route::match(['get', 'post'], '/',  [ServisProductController::class, 'index']);
    Route::get('/{slugs}', [ServisProductController::class, 'details']);
    Route::match(['post', 'delete'], '/{slugs}/update', [ServisProductController::class, 'update']);
});

Route::prefix('news-artikel')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{slugs}', [NewsController::class, 'details'])->name('detailsNews');
    Route::post('/create', [NewsController::class, 'create'])->name('createNews');
    Route::match(['post', 'delete'], '/{slugs}/update', [NewsController::class, 'update']);
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

Route::prefix('contact')->group(function() {
    Route::get('/', [ContactController::class, 'index'])->name('getContact');
    Route::post('/post', [ContactController::class, 'create'])->name('createContact');
    // Route::delete('/{id}', [ContactController::class, 'delete'])->name('deleteContact');
    Route::match(['get', 'delete'], '/{id}',[ContactController::class, 'delete']);
});

Route::prefix('our-client')->group(function(){
    Route::match(['get', 'post'], '/', [OurClientController::class, 'index'])->name('ourClient');
    Route::match(['post', 'delete'], '/{slugs}', [OurClientController::class, 'update'])->name('ourClientUpdate');
});


// login
Route::post('user-login', [AuthController::class, 'login'])->name('loginUser');
