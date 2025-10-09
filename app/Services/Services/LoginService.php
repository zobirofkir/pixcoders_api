<?php

namespace App\Services\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use App\Services\Constructors\LoginConstructor;
use Illuminate\Support\Facades\Hash;

class LoginService implements LoginConstructor
{
    /**
     * Login The User
     */
    public function login(LoginRequest $request) : LoginResource
    {
        $validatedData = $request->validated();
        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            abort(401);
        }

        return LoginResource::make($user);
    }
}