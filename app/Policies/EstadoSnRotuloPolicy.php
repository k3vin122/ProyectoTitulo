<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EstadoSnRotulo;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstadoSnRotuloPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the estadoSnRotulo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoSnRotulo can view the model.
     */
    public function view(User $user, EstadoSnRotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoSnRotulo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoSnRotulo can update the model.
     */
    public function update(User $user, EstadoSnRotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoSnRotulo can delete the model.
     */
    public function delete(User $user, EstadoSnRotulo $model): bool
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
     * Determine whether the estadoSnRotulo can restore the model.
     */
    public function restore(User $user, EstadoSnRotulo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the estadoSnRotulo can permanently delete the model.
     */
    public function forceDelete(User $user, EstadoSnRotulo $model): bool
    {
        return false;
    }
}