<?php

namespace App\Policies;

use App\Models\User;
use App\Models\IngresoCintaSnRotulo;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngresoCintaSnRotuloPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ingresoCintaSnRotulo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ingresoCintaSnRotulo can view the model.
     */
    public function view(User $user, IngresoCintaSnRotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ingresoCintaSnRotulo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ingresoCintaSnRotulo can update the model.
     */
    public function update(User $user, IngresoCintaSnRotulo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ingresoCintaSnRotulo can delete the model.
     */
    public function delete(User $user, IngresoCintaSnRotulo $model): bool
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
     * Determine whether the ingresoCintaSnRotulo can restore the model.
     */
    public function restore(User $user, IngresoCintaSnRotulo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the ingresoCintaSnRotulo can permanently delete the model.
     */
    public function forceDelete(User $user, IngresoCintaSnRotulo $model): bool
    {
        return false;
    }
}
