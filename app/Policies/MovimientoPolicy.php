<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Movimiento;
use Illuminate\Auth\Access\HandlesAuthorization;

class MovimientoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the movimiento can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the movimiento can view the model.
     */
    public function view(User $user, Movimiento $model): bool
    {
        return true;
    }

    /**
     * Determine whether the movimiento can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the movimiento can update the model.
     */
    public function update(User $user, Movimiento $model): bool
    {
        return true;
    }

    /**
     * Determine whether the movimiento can delete the model.
     */
    public function delete(User $user, Movimiento $model): bool
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
     * Determine whether the movimiento can restore the model.
     */
    public function restore(User $user, Movimiento $model): bool
    {
        return false;
    }

    /**
     * Determine whether the movimiento can permanently delete the model.
     */
    public function forceDelete(User $user, Movimiento $model): bool
    {
        return false;
    }
}
