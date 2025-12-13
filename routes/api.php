<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GetStartedController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {

    /**
     * Portfolios Route
     */
    Route::apiResource('portfolios', PortfolioController::class);

    /**
     * Blog Route
     */
    Route::apiResource('blogs', BlogController::class);

    /**
     * Contact Route
     */
    Route::apiResource('contacts', ContactController::class);

    /**
     * Get Started Route
     */
    Route::apiResource('get-started', GetStartedController::class);

    /**
     * Subscribtion Routes
     */
    Route::apiResource('subscribers', SubscriberController::class);

});
