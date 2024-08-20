<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ItemTypeController;
use App\Http\Controllers\Api\SaleController;
use Illuminate\Routing\Route;

Route::apiResource('sales', SaleController::class);
Route::apiResource('item-types', ItemTypeController::class);
Route::apiResource('items', ItemController::class);

Route::get('/items', [ItemController::class, 'index']); 
Route::post('/items', [ItemController::class, 'store']); 
Route::get('/items/{id}', [ItemController::class, 'show']); 
Route::put('/items/{id}', [ItemController::class, 'update']); 
Route::delete('/items/{id}', [ItemController::class, 'destroy']); 

Route::get('/item-types', [ItemTypeController::class, 'index']); 
Route::post('/item-types', [ItemTypeController::class, 'store']); 
Route::get('/item-types/{id}', [ItemTypeController::class, 'show']); 
Route::put('/item-types/{id}', [ItemTypeController::class, 'update']);
Route::delete('/item-types/{id}', [ItemTypeController::class, 'destroy']);

Route::get('/sales', [SaleController::class, 'index']); 
Route::post('/sales', [SaleController::class, 'store']); 
Route::get('/sales/{id}', [SaleController::class, 'show']); 
Route::put('/sales/{id}', [SaleController::class, 'update']); 
Route::delete('/sales/{id}', [SaleController::class, 'destroy']);