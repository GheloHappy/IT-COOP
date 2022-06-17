<?php

use App\Http\Controllers\Api\Admin\AdminSavingsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('/user')->group(function() {
        Route::apiResource('usersavings',UserController::class);
    });
});

Route::prefix('/admin')->group(function() {
    Route::apiResource('savings',AdminSavingsController::class);
});
