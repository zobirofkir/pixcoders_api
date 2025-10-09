<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/**
 * User Routes
 */
Route::apiResource('users', UserController::class);