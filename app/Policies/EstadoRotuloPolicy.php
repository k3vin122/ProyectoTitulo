<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EstadoRotulo;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstadoRotuloPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the estadoRotulo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoRotulo can view the model.
     */
    public function view(User $user, EstadoRotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoRotulo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoRotulo can update the model.
     */
    public function update(User $user, EstadoRotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoRotulo can delete the model.
     */
    public function delete(User $user, EstadoRotulo $model): bool
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
     * Determine whether the estadoRotulo can restore the model.
     */
    public function restore(User $user, EstadoRotulo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the estadoRotulo can permanently delete the model.
     */
    public function forceDelete(User $user, EstadoRotulo $model): bool
    {
        return false;
    }
}
