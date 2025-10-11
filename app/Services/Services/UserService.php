<?php

namespace App\Services\Services;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Constructors\UserConstructor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService implements UserConstructor
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(
            User::paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('users', 'public');
        }

        $baseName = Str::slug($data['name']);
        $randomDigits = random_int(1000, 9999);
        $generatedPassword = $baseName . $randomDigits;

        $data['password'] = Hash::make($generatedPassword);

        $user = User::create($data);

        return UserResource::make($user)->additional([
            'generated_password' => $generatedPassword,
        ]);
    }        
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return UserResource::make(
            $user
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('users', 'public');
        } elseif (isset($data['avatar']) && $data['avatar'] === 'null') {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
                $data['avatar'] = null;
            }
        }

        $user->update($data);
        return UserResource::make($user->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $user->delete();
    }
}