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

Route::prefix('/catalog')->group(function(){
    Route::get('',                              CatalogController::class);
});



Route::prefix('')->group(function(){
    Route::post('/create-order',                 CreateOrderController::class);
    Route::patch('/approve-order/{orderId}',     ApproveOrderController::class);
});
