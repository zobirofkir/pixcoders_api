<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/**
 * User Routes
 */
Route::apiResource('users', UserController::class)->except(['update']);

/**
 * Update Route
 */
Route::post('users/{user}', [UserController::class, 'update']);

/**
 * Portfolio Routes
 */
Route::apiResource('portfolios', PortfolioController::class)->except(['update']);