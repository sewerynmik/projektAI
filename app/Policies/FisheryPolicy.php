<?php

namespace App\Policies;

use App\Models\Fishery;
use App\Models\User;

class FisheryPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Fishery $fishery): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Fishery $fishery): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Fishery $fishery): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Fishery $fishery): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Fishery $fishery): bool
    {
        return $user->isAdmin();
    }
}
