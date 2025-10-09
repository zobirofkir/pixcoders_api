<?php

namespace App\Services\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\Constructors\UserConstructor;

class UserService implements UserConstructor
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}