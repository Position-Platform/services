<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Abonnement;
use App\Models\User;

class AbonnementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Abonnement');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Abonnement $abonnement): bool
    {
        return $user->can('view Abonnement');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Abonnement');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Abonnement $abonnement): bool
    {
        return $user->can('update Abonnement');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Abonnement $abonnement): bool
    {
        return $user->can('delete Abonnement');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Abonnement $abonnement): bool
    {
        return $user->can('restore Abonnement');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Abonnement $abonnement): bool
    {
        return $user->can('force-delete Abonnement');
    }
}
