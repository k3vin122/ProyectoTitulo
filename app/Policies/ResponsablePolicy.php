<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Responsable;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResponsablePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the responsable can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the responsable can view the model.
     */
    public function view(User $user, Responsable $model): bool
    {
        return true;
    }

    /**
     * Determine whether the responsable can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the responsable can update the model.
     */
    public function update(User $user, Responsable $model): bool
    {
        return true;
    }

    /**
     * Determine whether the responsable can delete the model.
     */
    public function delete(User $user, Responsable $model): bool
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
     * Determine whether the responsable can restore the model.
     */
    public function restore(User $user, Responsable $model): bool
    {
        return false;
    }

    /**
     * Determine whether the responsable can permanently delete the model.
     */
    public function forceDelete(User $user, Responsable $model): bool
    {
        return false;
    }
}
