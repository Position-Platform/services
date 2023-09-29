<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Tracking;
use App\Models\User;

class TrackingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Tracking');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tracking $tracking): bool
    {
        return $user->can('view Tracking');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Tracking');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tracking $tracking): bool
    {
        return $user->can('update Tracking');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tracking $tracking): bool
    {
        return $user->can('delete Tracking');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tracking $tracking): bool
    {
        return $user->can('restore Tracking');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tracking $tracking): bool
    {
        return $user->can('force-delete Tracking');
    }
}
