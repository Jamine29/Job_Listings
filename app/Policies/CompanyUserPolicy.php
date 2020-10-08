<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyUsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->check();
    }
    
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return auth()->check();
    }
}
