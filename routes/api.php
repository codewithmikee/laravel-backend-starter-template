<?php

use App\Http\Controllers\Api\ApiControllerTest;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ApiControllerTest::class, 'index']);

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index']);
})->middleware('auth:sanctum');

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
    Route::prefix('{post}')->group(function () {
        Route::put('/', [PostController::class, 'update']);
        Route::delete('/', [PostController::class, 'destroy']);
    });
})->middleware('auth:sanctum');
