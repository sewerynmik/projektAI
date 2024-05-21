<?php

namespace App\Policies;

use App\Models\Haul;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class HaulPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Haul $haul): bool
    {
        Log::info('User fisherman_id: ' . $user->fisherman_id);
        Log::info('Haul fisherman_id: ' . $haul->fisherman_id);

        return $user->fisherman_id === $haul->fisherman_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Haul $haul): bool
    {
        return $user->haul_id === $haul->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Haul $haul): bool
    {
        return true;
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
