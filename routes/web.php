<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => redirect()->route('dashboard.index'));

Auth::routes(['register' => false, 'confirm' => false, 'reset' => false]);


Route::middleware('auth:admins')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

    Route::get('/categories/index', [CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{category}/update', [CategoryController::class,'update'])->name('categories.update');
    Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');



    Route::get('/companies/create', [CompanyController::class,'create'])->name('companies.create');
    Route::get('/companies/index', [CompanyController::class,'index'])->name('companies.index');
    Route::get('/companies/{company}/edit', [CompanyController::class,'edit'])->name('companies.edit');
    Route::put('/companies/{company}/update', [CompanyController::class,'update'])->name('companies.update');
    Route::post('/companies', [CompanyController::class,'store'])->name('companies.store');


    Route::get('/products/index', [ProductController::class,'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
    Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');
    Route::put('/products/{product}/update', [ProductController::class,'update'])->name('products.update');
    Route::post('/products', [ProductController::class,'store'])->name('products.store');
    Route::get('/getChildsCategory/{id}', [ProductController::class,'getChildsCategory']);
});






Route::get('/test', function () {
    dd(Auth::guard('admins')->user()->name);
});
