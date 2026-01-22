<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products{id} ', [ProductController::class, 'show']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/products', [ProductController::class, 'create']);
    Route::put('/products{id} ', [ProductController::class, 'update']);
    Route::delete('/products{id} ', [ProductController::class, 'destroy']);
});
