<?php

namespace App\Repositories\Interfaces;

use App\Models\Company;

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
     * @param Company $company
     * @param array $updatedCompany
     */
    public function update(Company $company, array $updatedCompany);

    /**
     * delete a company by it's ID
     * @param int
     */
    public function delete(int $userId);
}
