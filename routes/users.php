<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/**
 * Login Route
 */
Route::post('login', [LoginController::class, 'login']);