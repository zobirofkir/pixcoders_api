<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/**
 * Protected Routes
 */
Route::middleware('auth:api')->prefix("auth")->group(function() {

    /**
     * Protected Routes
     */
    require_once __DIR__ . '/auth.php';
});