<?php

namespace App\Repositories;

use App\Models\Job;
use App\Repositories\Interfaces\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface
{
    /**
     * returns all jobs
     * 
     * @return mixed
     */
    public function all()
    {
        return Job::all();
    }

    /**
     * returns a job by it's ID
     * @param int
     */
    public function show(Job $job)
    {
        //return Job::findOrFail($jobId);
    }

    /**
     * create a job
     * @param array
     * @return boolean
     */
    public function create(array $newJob)
    {
        try {
            Job::create($newJob);
            return true;
        }
        catch(\Illuminate\Database\QueryException $exception) {
            return false;
        }
    }

    /**
     * Update a job.
     * @param  Job  $job
     * @param array
     */
    public function update(Job $job, array $updatedJob)
    {
        $job->update($updatedJob);
    }

    /**
     * Delete a job.
     * @param Job $job
     */
    public function delete(Job $job)
    {
        $job->delete();
    }
}
