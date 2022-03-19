<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class,'login']);




Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class,'getCategories']);
Route::get('/subcategories/{category}', [CategoryController::class,'getSubcategories']);
Route::get('/subcategorychilds/{category}', [CategoryController::class,'getSubcategoryChilds']);

Route::get('/companies', [CompanyController::class,'getCompanies']);
Route::post('/products', [ProductController::class,'getProducts']);
});
