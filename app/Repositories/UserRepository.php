<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Returns a user.
     * @param User $user
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Delete a user.
     * @param User $user
     */
    public function delete(User $user)
    {
        $user->delete();
    }
}
