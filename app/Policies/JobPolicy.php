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
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user=null)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job $job
     * @return mixed
     */
    
    public function view(User $user, Job $job) 
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
        dd('in create');
        //return auth()->check();
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job  $job
     * @return mixed
     */
    public function update(User $user, Job $job)
    {
        //dd('in update');
        foreach($user->companies()->get() as $companyUser) {
            if($companyUser->id === $job->id) {
                $managerArray = $companyUser->managers()->get();
                foreach($managerArray as $manager) {
                    if($user->id === $manager->id) {
                        //dd($manager);
                        return true;
                    }
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job  $job
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
        //dd('in delete');
        foreach($user->companies()->get() as $companyUser) {
            if($companyUser->id === $job->id) {
                $managerArray = $companyUser->managers()->get();
                foreach($managerArray as $manager) {
                    if($user->id === $manager->id) {
                        //dd($manager);
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
