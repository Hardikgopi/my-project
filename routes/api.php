<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::apiResource('posts', PostController::class);
