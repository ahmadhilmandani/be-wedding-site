<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::apiResource('/users', UserController::class);
});
Route::get('/test', [AuthController::class, 'test'])->middleware(('auth:sanctum'));