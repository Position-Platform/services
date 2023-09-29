<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Commentaire;
use App\Models\User;

class CommentairePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['admin','user']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Commentaire $commentaire): bool
    {
        return $user->hasRole(['admin','user']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['admin','user']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Commentaire $commentaire): bool
    {
        return $user->hasRole(['admin','user']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Commentaire $commentaire): bool
    {
        return $user->hasRole(['admin','user']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Commentaire $commentaire): bool
    {
        return $user->hasRole(['admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Commentaire $commentaire): bool
    {
        return $user->hasRole(['admin']);
    }
}
