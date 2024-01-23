<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Rotulo;
use Illuminate\Auth\Access\HandlesAuthorization;

class RotuloPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rotulo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rotulo can view the model.
     */
    public function view(User $user, Rotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rotulo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rotulo can update the model.
     */
    public function update(User $user, Rotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rotulo can delete the model.
     */
    public function delete(User $user, Rotulo $model): bool
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
     * Determine whether the rotulo can restore the model.
     */
    public function restore(User $user, Rotulo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the rotulo can permanently delete the model.
     */
    public function forceDelete(User $user, Rotulo $model): bool
    {
        return false;
    }
}
