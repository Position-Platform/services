<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Paiement;
use App\Models\User;

class PaiementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Paiement');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Paiement $paiement): bool
    {
        return $user->can('view Paiement');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Paiement');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Paiement $paiement): bool
    {
        return $user->can('update Paiement');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Paiement $paiement): bool
    {
        return $user->can('delete Paiement');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Paiement $paiement): bool
    {
        return $user->can('restore Paiement');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Paiement $paiement): bool
    {
        return $user->can('force-delete Paiement');
    }
}
