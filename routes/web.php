<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ModuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/company/company-info', [CompanyController::class, 'index'])->name('companyinfo');
Route::match(['get', 'post'], '/company/user-info', [CompanyController::class, 'userInfo'])->name('userinfo');

Route::post('/company/user-create', [CompanyController::class, 'userCreateAdministrator'])->name('createUserAdministrator');


/**
 * Begin Route Module Dashboard
 * 1. Route ini akan diakses nanti ketika user sudah membuat akun
 * 2. Route Middelware
 */
Route::prefix('/module')->group(function(){
    Route::get('/index',[ModuleController::class, 'index'])->name('indexModule');

});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});
