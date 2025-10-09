<?php

namespace App\Services\Constructors;

use App\Http\Requests\UserRequest;
use App\Models\User;

interface UserConstructor
{
    /**
     * Display a listing of the resource.
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request);

    /**
     * Display the specified resource.
     */
    public function show(User $user);

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user);
}