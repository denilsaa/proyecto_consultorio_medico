<?php

namespace App\Policies;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class RolPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $user, Rol $rol): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $user, Rol $rol): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $user, Rol $rol): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $user, Rol $rol): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $user, Rol $rol): bool
    {
        //
    }
}
