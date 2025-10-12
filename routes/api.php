<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("users")->group(function() {
    Route::apiResource('portfolios', PortfolioController::class);
});