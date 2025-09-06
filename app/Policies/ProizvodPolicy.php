<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Proizvod;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProizvodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the proizvod can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the proizvod can view the model.
     */
    public function view(User $user, Proizvod $model): bool
    {
        return true;
    }

    /**
     * Determine whether the proizvod can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the proizvod can update the model.
     */
    public function update(User $user, Proizvod $model): bool
    {
        return true;
    }

    /**
     * Determine whether the proizvod can delete the model.
     */
    public function delete(User $user, Proizvod $model): bool
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
     * Determine whether the proizvod can restore the model.
     */
    public function restore(User $user, Proizvod $model): bool
    {
        return false;
    }

    /**
     * Determine whether the proizvod can permanently delete the model.
     */
    public function forceDelete(User $user, Proizvod $model): bool
    {
        return false;
    }
}
