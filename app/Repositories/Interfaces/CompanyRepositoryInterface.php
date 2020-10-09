<?php

namespace App\Repositories\Interfaces;

use App\Models\Company;

interface CompanyRepositoryInterface
{
    /**
     * Returns all companies.
     * 
     * @return mixed
     */
    public function all();

    /**
     * Returns a company.
     * 
     * @param  Company $company
     */
    public function show(Company $company);

    /**
     * Create a company.
     * 
     * @param  array  $newCompany
     */
    public function create(array $newCompany);

    /**
     * Update a Company.
     * 
     * @param Company $company
     * @param array $updatedCompany
     */
    public function update(Company $company, array $updatedCompany);

    /**
     * Delete a company.
     * 
     * @param Company $company
     */
    public function delete(Company $company);
}
