<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * returns all users
     * 
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * returns a user by it's ID
     * @param int
     */
    public function show(int $userId)
    {
        return User::findOrFail($userId);
    }

    /**
     * create a user
     * @param array
     * @return boolean
     */
    public function create(array $new_user)
    {
        try {
            User::create($new_user);
            return true;
        }
        catch(\Illuminate\Database\QueryException $exception) {
            return false;
        }
    }

    /**
     * update a user by it's ID
     * @param int
     * @param array
     */
    public function update(int $userId, array $updatedUser)
    {
        User::findOrFail($userId)->update($updatedUser);
    }

    /**
     * delete a user by it's ID
     * @param int
     */
    public function delete(int $userId)
    {
        User::findOrFail($userId)->delete();
    }
}
