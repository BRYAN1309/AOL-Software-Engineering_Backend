<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthPenjualController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    // Route::post('register', [AuthController::class, 'register']);
    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('logout', [AuthController::class, 'logout']);
    // Route::post('refresh', [AuthController::class, 'refresh']);
    // Route::post('me', [AuthController::class, 'me']);
    // Route::post('/register', [AuthPenjualController::class, 'register']);
    // Route::post('/login', [AuthPenjualController::class, 'login']);

    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::post('/logout', [AuthPenjualController::class, 'logout']);
    //     // You can add protected penjual-only routes here
    // });
    Route::prefix('/user')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

// Routes for Penjual Auth
    Route::prefix('/penjual')->group(function () {
        Route::post('register', [AuthPenjualController::class, 'register']);
        Route::post('login', [AuthPenjualController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('logout', [AuthPenjualController::class, 'logout']);
        });
    });
});