<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * Returns all companies.
     *
     * @return mixed
     */
    public function all()
    {
        return Company::all();
    }

    /**
     * Returns a company.
     * 
     * @param  Company  $company
     */
    public function show(Company $company)
    {
        return $company;
    }

    /**
     * Create a company
     * 
     * @param  array  Company $newCompany
     * @return  boolean
     */
    public function create(array $newCompany)
    {
        try {
            Company::create($newCompany);
            return true;
        }
        catch(\Illuminate\Database\QueryException $exception) {
            return false;
        }
    }

    /**
     * Update a company.
     * 
     * @param  Company  $company
     * @param  array  $updatedCompany
     */
    public function update(Company $company, array $updatedCompany)
    {
        $company->update($updatedCompany);
    }

    /**
    * Delete a company.
    *
    * @param Compaany $company
    */
    public function delete(Company $company)
    {
        $company->delete();
    }
}
