<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    /**
     * returns all users
     * 
     * @return mixed
     */
    public function all();

    /**
     * returns a user by it's ID
     * @param int
     */
    public function show(int $userId);

    /**
     * create a user
     * @param array
     */
    public function create(array $newUser);

    /**
     * update a user by it's ID
     * @param int
     * @param array
     */
    public function update(int $userId, array $updatedUser);

    /**
     * delete a user by it's ID
     * @param int
     */
    public function delete(int $userId);
}
