<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user=null)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @param  Job $job
     * @return mixed
     */
    
    public function view(User $user=null, Job $job) 
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
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
     * @param  Job  $job
     * @return mixed
     */
    public function update(User $user, Job $job)
    {
        return $this->isManager($user, $job);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Job  $job
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
        return $this->isManager($user, $job);
    }

    /**
     * Determine whether the user is a manager of the company.
     *
     * @param  User  $user
     * @param  Job  $job
     * @return mixed
     */
    public function isManager(User $user, Job $job)
    {
        foreach($user->companies()->get() as $companyUser) {
            if($companyUser->id === $job->companyId) {
                $managerArray = $companyUser->managers()->get();
                foreach($managerArray as $manager) {
                    if($user->id === $manager->id) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
