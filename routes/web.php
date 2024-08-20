<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\SaleController;

Route::resource('items', ItemController::class);
Route::resource('item-types', ItemTypeController::class);
Route::resource('sales', SaleController::class);

Route::get('/api/items', [ItemController::class, 'index']);
Route::get('/api/sales', [SaleController::class, 'index']);

