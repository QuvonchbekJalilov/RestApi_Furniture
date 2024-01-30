<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::post('change-passsword', [AuthController::class, 'changePasssword']);
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');
