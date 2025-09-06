<?php

namespace App\Policies;

use App\Models\User;
use App\Models\GrupaProizvoda;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrupaProizvodaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the grupaProizvoda can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the grupaProizvoda can view the model.
     */
    public function view(User $user, GrupaProizvoda $model): bool
    {
        return true;
    }

    /**
     * Determine whether the grupaProizvoda can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the grupaProizvoda can update the model.
     */
    public function update(User $user, GrupaProizvoda $model): bool
    {
        return true;
    }

    /**
     * Determine whether the grupaProizvoda can delete the model.
     */
    public function delete(User $user, GrupaProizvoda $model): bool
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
     * Determine whether the grupaProizvoda can restore the model.
     */
    public function restore(User $user, GrupaProizvoda $model): bool
    {
        return false;
    }

    /**
     * Determine whether the grupaProizvoda can permanently delete the model.
     */
    public function forceDelete(User $user, GrupaProizvoda $model): bool
    {
        return false;
    }
}
