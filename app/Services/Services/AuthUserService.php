<?php

namespace App\Services\Services;

use App\Models\User;
use App\Http\Resources\AuthUserResource;
use App\Services\Constructors\AuthUserConstructor;
use Illuminate\Support\Facades\Auth;

class AuthUserService implements AuthUserConstructor
{
    /**
     * Get Current Auth User
     */
    public function me(): AuthUserResource
    {
        return AuthUserResource::make(Auth::user());
    }
}