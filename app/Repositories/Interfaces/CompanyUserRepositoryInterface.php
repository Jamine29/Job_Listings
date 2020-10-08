<?php

namespace App\Repositories\Interfaces;

interface CompanyUserRepositoryInterface
{
    /**
     * create a CompanyUser
     * @param array
     */
    public function create(array $newCompanyUsers);

    /**
     * delete a CompanyUser by user and company id
     * @param int
     * @param int
     */
    public function delete(int $companyId, int $userId);
}
