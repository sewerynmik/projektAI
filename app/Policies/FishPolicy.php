<?php

namespace App\Policies;

use App\Models\Fish;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FishPolicy
{
    use HandlesAuthorization;


    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user): bool
    {
        return true;
    }

    public function delete(User $user): bool
    {
        return true;
    }

    public function view(User $user, Fish $fish): bool
    {
        return false;
    }


}
