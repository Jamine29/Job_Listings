<?php

namespace App\Repositories;

use App\Models\Job;
use App\Repositories\Interfaces\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface
{
    /**
     * Returns all jobs.
     * 
     * @return mixed
     */
    public function all()
    {
        return Job::all();
    }

    /**
     * Returns a job.
     * 
     * @param  Job  $job
     */
    public function show(Job $job)
    {
        return $job;
    }

    /**
     * Create a job.
     * 
     * @param  array  $newJob
     * @return  boolean
     */
    public function create(array $newJob)
    {
        try {
            return Job::create($newJob);
        }
        catch(\Illuminate\Database\QueryException $exception) {
            return null;
        }
    }

    /**
     * Update a job.
     * 
     * @param  Job  $job
     * @param  array  $updatedJob
     */
    public function update(Job $job, array $updatedJob)
    {
        $job->update($updatedJob);
    }

    /**
     * Delete a job.
     * 
     * @param  Job  $job
     */
    public function delete(Job $job)
    {
        $job->delete();
    }
}
