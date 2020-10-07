<?php

namespace App\Repositories;

use App\Models\CompanyUsers;
use App\Repositories\Interfaces\CompanyUsersRepositoryInterface;

class CompanyUsersRepository implements CompanyUsersRepositoryInterface
{
    /**
     * create a company
     * @param arrray
     * @return boolean
     */
    public function create(array $newCompanyUsers)
    {
        try {
            CompanyUsers::create($newCompanyUsers);
            return true;
        }
        catch(\Illuminate\Database\QueryException $exception){
            return false;
        }
    }

    /**
     * delete a CompanyUser by user orand company id
     * @param int
     */
    public function delete($companyId, $userId)
    {
        CompanyUsers::where('userId','=',$userId)
                        ->where('companyId','=',$companyId)
                        ->delete();
    }
}
