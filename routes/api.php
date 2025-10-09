<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/**
 * Guest Routes
 */
Route::prefix('users')->group(function() {
    
    /**
     * Guest Routes
     */
    require_once __DIR__ . '/users.php';
});

/**
 * Protected Routes
 */
Route::middleware('auth:api')->prefix("auth")->group(function() {

    /**
     * Protected Routes
     */
    require_once __DIR__ . '/auth.php';
});