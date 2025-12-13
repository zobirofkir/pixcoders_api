<?php

namespace App\Policies;

use App\Models\Subscriber;
use App\Models\User;

class SubscriberPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Subscriber $subscriber): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Subscriber $subscriber): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Subscriber $subscriber): bool
    {
        return $user->hasRole('admin');
    }
}
