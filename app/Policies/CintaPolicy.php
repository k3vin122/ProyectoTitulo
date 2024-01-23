<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cinta;
use Illuminate\Auth\Access\HandlesAuthorization;

class CintaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cinta can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the cinta can view the model.
     */
    public function view(User $user, Cinta $model): bool
    {
        return true;
    }

    /**
     * Determine whether the cinta can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the cinta can update the model.
     */
    public function update(User $user, Cinta $model): bool
    {
        return true;
    }

    /**
     * Determine whether the cinta can delete the model.
     */
    public function delete(User $user, Cinta $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the cinta can restore the model.
     */
    public function restore(User $user, Cinta $model): bool
    {
        return false;
    }

    /**
     * Determine whether the cinta can permanently delete the model.
     */
    public function forceDelete(User $user, Cinta $model): bool
    {
        return false;
    }
}
