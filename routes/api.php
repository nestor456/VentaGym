<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/producto/{id}/subCategory',  [ProductoController::class, 'bySubCategory']);
Route::get('/cliente/{id}/provincia',  [DepartmentController::class, 'byprovincia']);
Route::get('/cliente/{id}/distrito',  [DepartmentController::class, 'bydistrito']);
