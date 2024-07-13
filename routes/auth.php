<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::post('register', Controllers\Auth\RegisterController::class);

Route::post('login', Controllers\Auth\LoginController::class);

Route::get('user', Controllers\Auth\AuthenticatedUserController::class)->middleware('auth:sanctum');

Route::get('check-user-token', Controllers\Auth\CheckUserTokenController::class);

Route::post('logout', Controllers\Auth\LogoutController::class)->middleware('auth:sanctum');
