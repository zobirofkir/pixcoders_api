<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Facades\LoginFacade;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Login The User
     */
    public function login(LoginRequest $request)
    {
        return LoginFacade::login($request);
    }
}
