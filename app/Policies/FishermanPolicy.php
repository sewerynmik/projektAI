<?php

namespace App\Policies;

use App\Models\Fisherman;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FishermanPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, Fisherman $fisherman): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Fisherman $fisherman): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Fisherman $fisherman): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Fisherman $fisherman): bool
    {
        return false;
    }

    public function forceDelete(User $user, Fisherman $fisherman): bool
    {
        return false;
    }
}
