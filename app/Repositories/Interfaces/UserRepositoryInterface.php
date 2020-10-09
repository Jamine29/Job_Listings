<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Returns a user.
     * 
     * @param User $user
     */
    public function show(User $user);

    /**
     * Delete a user.
     * 
     * @param User $user
     */
    public function delete(User $user);
}
