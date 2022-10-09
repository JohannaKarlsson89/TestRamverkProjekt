<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoriesController;
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
Route::resource('categories', CategoriesController::class);
Route::resource('items', ItemController::class);

Route::get('getItemsByCategory/{id}',[ItemController::class, 'getItemsByCategory']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
