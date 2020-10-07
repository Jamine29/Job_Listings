<?php

namespace App\Repositories\Interfaces;

interface CompanyUsersRepositoryInterface
{
    /**
    * returns all companies
    * 
    * @return mixed
    */
    public function getAll();

    /**
    * returns a companie by user id
    * @param int
    */
    public function getCompaniesByUserId($user_id);

    /**
    * returns a users by company id
    * @param int
    */
    public function getUsersByCompanyId($company_id);

    /**
    * create a CompanyUser
    * @param array
    */
    public function create($new_company_users);

    /**
    * delete a CompanyUser by user or company id
    * @param int
    */
    public function delete($company_id, $user_id);
}