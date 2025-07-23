<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/halo', function () {
//     return response()->json(['message' => 'Halo dari API Laravel 12']);
// });

Route::post('register', [AuthController::class, 'store']);
Route::post('login', [AuthController::class, 'auth']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('activities', [ActivityController::class, 'index']);
    Route::post('activities', [ActivityController::class, 'store']);
    Route::get('activities/{activity}', [ActivityController::class, 'show']);
    Route::put('activities/{activity}', [ActivityController::class, 'update']);
    Route::delete('activities/{activity}', [ActivityController::class, 'destroy']);
});
