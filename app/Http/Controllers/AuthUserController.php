<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthUserResource;
use App\Models\User;
use App\Services\Facades\AuthUserFacade;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    /**
     * Get Current Auth User
     */
    public function me () : AuthUserResource
    {
        return AuthUserFacade::me();
    }

    /**
     * Logout Current Auth User
     */
    public function logout() : bool
    {
        return AuthUserFacade::logout();
    }
}
