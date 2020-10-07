<?php

namespace App\Repositories\Interfaces;

interface CompanyRepositoryInterface
{
    /**
     * returns all companies
     * 
     * @return mixed
     */
    public function all();

    /**
     * returns a company by it's ID
     * @param int
     */
    public function show(int $userId);

    /**
     * create a company
     * @param array
     */
    public function create(array $newCompany);

    /**
     * update a company by it's ID
     * @param int
     * @param array
     */
    public function update(int $userId, array $updatedCompany);

    /**
     * delete a company by it's ID
     * @param int
     */
    public function delete(int $userId);
}
