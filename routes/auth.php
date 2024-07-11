<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::post('register', Controllers\Auth\RegisterController::class);
