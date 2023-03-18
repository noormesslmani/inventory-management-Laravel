<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ItemController;
Route::group(['prefix' => 'v1.0.0'], function () {
    
    Route::group(['prefix' => 'auth'], function ($router) {

        Route::post('/register', [AuthController::class, 'register']); 
        Route::post('/login', [AuthController::class, 'authenticate']); 

        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('/logout', [AuthController::class, 'logout']);
        });

    });
    
    Route::group(['middleware' => 'auth:api'], function () {

        Route::group(['prefix' => 'user'], function () {
            
            Route::get('/', [ProfileController::class, 'index']);
            Route::patch('/', [ProfileController::class, 'update']);
            Route::patch('/password', [ProfileController::class, 'changePassword']);
            
        });

        Route::group(['prefix' => 'products'], function () {
    
            Route::get('/', [ProductController::class, 'index']);
            Route::post('/', [ProductController::class, 'create']);
            Route::patch('/{id}', [ProductController::class, 'update']);
            Route::delete('/{id}', [ProductController::class, 'destroy']);
            Route::get('/search', [ProductController::class, 'search']);

            Route::get('/{product_id}/items', [ItemController::class, 'index']);
            Route::get('/{product_id}/search', [ItemController::class, 'search']);
        });

        Route::group(['prefix' => 'items'], function () {

            Route::post('/', [ItemController::class, 'create']);
            Route::patch('/{item_id}', [ItemController::class, 'update']);
            Route::delete('/{item_id}', [ItemController::class, 'destroy']);

        });

    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
