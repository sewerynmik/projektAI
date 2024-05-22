<?php

namespace App\Policies;

use App\Models\Fish;
use App\Models\User;

class FishPolicy
{
    public function view(User $user): bool
    {
        return true;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function show(User $user, Fish $fish): bool
    {
        return true;
    }

    public function forceDelete(User $user, Fish $fish): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user, Fish $fish): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Fish $fish): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Fish $fish): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Fish $fish): bool
    {
        return $user->isAdmin();
    }


}
