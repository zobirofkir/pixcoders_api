<?php

namespace App\Services\Constructors;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;

interface LoginConstructor
{
    /**
     * Login The User
     */
    public function login(LoginRequest $request) : LoginResource;
}