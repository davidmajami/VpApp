<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Narudzbina;
use Illuminate\Auth\Access\HandlesAuthorization;

class NarudzbinaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the narudzbina can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the narudzbina can view the model.
     */
    public function view(User $user, Narudzbina $model): bool
    {
        return true;
    }

    /**
     * Determine whether the narudzbina can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the narudzbina can update the model.
     */
    public function update(User $user, Narudzbina $model): bool
    {
        return true;
    }

    /**
     * Determine whether the narudzbina can delete the model.
     */
    public function delete(User $user, Narudzbina $model): bool
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
     * Determine whether the narudzbina can restore the model.
     */
    public function restore(User $user, Narudzbina $model): bool
    {
        return false;
    }

    /**
     * Determine whether the narudzbina can permanently delete the model.
     */
    public function forceDelete(User $user, Narudzbina $model): bool
    {
        return false;
    }
}
