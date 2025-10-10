<?php

namespace App\Services\Constructors;

use App\Http\Resources\AuthUserResource;
use App\Models\User;

interface AuthUserConstructor
{
    /**
     * Get Current Auth User
     */
    public function me() : AuthUserResource;

    /**
     * Logout Current Auth User
     */
    public function logout() : bool;
}