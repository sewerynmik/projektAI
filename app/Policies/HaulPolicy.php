<?php

namespace App\Policies;

use App\Models\Haul;
use App\Models\User;

class HaulPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Haul $haul): bool
    {
        if ($user->isAdmin()){
            return true;
        }
        return $user->fisherman_id === $haul->fisherman_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Haul $haul): bool
    {
        if ($user->isAdmin()){
            return true;
        }
        return $user->fisherman_id === $haul->fisherman_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Haul $haul): bool
    {
        if ($user->isAdmin()){
            return true;
        }
        return $user->fisherman_id === $haul->fisherman_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Haul $haul): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Haul $haul): bool
    {
        return true;
    }
}
