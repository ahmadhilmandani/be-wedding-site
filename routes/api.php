<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeddingController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::apiResource('/users', UserController::class);
});
// Route::get('/test', [AuthController::class, 'test'])->middleware(('auth:sanctum'));
// Route::get('/test', [AuthController::class, 'test'])->middleware(('auth:sanctum'));
// Route::get('/test', [WeddingController::class, 'addWedding']);
Route::post('/wedding', [WeddingController::class, 'add_wedding'])->middleware(('auth:sanctum'));

Route::get('/rsvp/{user_id}', [GuestController::class, 'index']);

Route::post('/rsvp', [GuestController::class, 'rsvp']);