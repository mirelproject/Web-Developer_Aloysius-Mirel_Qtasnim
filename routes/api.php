<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ItemTypeController;
use App\Http\Controllers\Api\SaleController;
use Illuminate\Routing\Route;

Route::apiResource('sales', SaleController::class);
Route::apiResource('item-types', ItemTypeController::class);
Route::apiResource('items', ItemController::class);