<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Horaire;
use App\Models\User;

class HorairePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Horaire');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Horaire $horaire): bool
    {
        return $user->can('view Horaire');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Horaire');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Horaire $horaire): bool
    {
        return $user->can('update Horaire');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Horaire $horaire): bool
    {
        return $user->can('delete Horaire');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Horaire $horaire): bool
    {
        return $user->can('restore Horaire');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Horaire $horaire): bool
    {
        return $user->can('force-delete Horaire');
    }
}
