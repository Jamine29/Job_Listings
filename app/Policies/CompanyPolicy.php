<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user=null)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Company  $company
     * @return mixed
     */
    public function view(User $user=null, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Company  $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        return $this->isManager($user, $company);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Company  $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        return $this->isManager($user, $company);
    }

     /**
     * Determine whether the user is a manager of the company.
     *
     * @param  User  $user
     * @param  Company  $company
     * @return mixed
     */
    public function isManager(User $user, Company $company) 
    {
        foreach($company->managers()->get() as $manager) {
            if($user->id === $manager->id) {
                return true;
            }
        }

        return false;
    }
}
