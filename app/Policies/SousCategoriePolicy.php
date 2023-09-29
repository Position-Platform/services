<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\SousCategorie;
use App\Models\User;

class SousCategoriePolicy
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
    public function view(User $user, SousCategorie $souscategorie): bool
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
    public function update(User $user, SousCategorie $souscategorie): bool
    {
       return $user->hasRole(['admin','user']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SousCategorie $souscategorie): bool
    {
        return $user->hasRole(['admin','user']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SousCategorie $souscategorie): bool
    {
        return $user->hasRole(['admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SousCategorie $souscategorie): bool
    {
        return $user->hasRole(['admin']);
    }
}
