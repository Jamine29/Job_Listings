<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * returns all companies
     *
     * @return mixed
     */
    public function all()
    {
        return Company::all();
    }

    /**
     * returns a company by it's ID
     * @param int
     */
    public function show(int $companyId)
    {
        return Company::findOrFail($companyId);
    }

    /**
     * create a company
     * @param array
     * @return boolean
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
     * update a company by it's ID
     * @param Company $company
     * @param array $updatedCompany
     */
    public function update(Company $company, array $updatedCompany)
    {
        $company->update($updatedCompany);
    }

    /**
    * delete a company by it's ID
    * @param int
    */
    public function delete(int $companyId)
    {
        Company::findOrFail($companyId)->delete();
    }
}
