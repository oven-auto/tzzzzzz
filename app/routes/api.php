<?php

use App\Http\Controllers\Api\V1\Catalog\CatalogController;
use App\Http\Controllers\Api\V1\Order\ApproveOrderController;
use App\Http\Controllers\Api\V1\Order\CreateOrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/catalog')->group(function(){
    Route::get('', CatalogController::class);
});



Route::prefix('/order')->group(function(){
    Route::post('', CreateOrderController::class);
    Route::patch('', ApproveOrderController::class);
});
