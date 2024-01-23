<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EstadoMovimiento;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstadoMovimientoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the estadoMovimiento can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoMovimiento can view the model.
     */
    public function view(User $user, EstadoMovimiento $model): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoMovimiento can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoMovimiento can update the model.
     */
    public function update(User $user, EstadoMovimiento $model): bool
    {
        return true;
    }

    /**
     * Determine whether the estadoMovimiento can delete the model.
     */
    public function delete(User $user, EstadoMovimiento $model): bool
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
     * Determine whether the estadoMovimiento can restore the model.
     */
    public function restore(User $user, EstadoMovimiento $model): bool
    {
        return false;
    }

    /**
     * Determine whether the estadoMovimiento can permanently delete the model.
     */
    public function forceDelete(User $user, EstadoMovimiento $model): bool
    {
        return false;
    }
}
