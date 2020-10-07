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
    public function show(int $jobId)
    {
        return Job::findOrFail($jobId);
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
     * update a job by it's ID
     * @param int
     * @param array
     */
    public function update(int $jobId, array $updatedJob)
    {
        Job::findOrFail($jobId)->update($updatedJob);
    }

    /**
     * delete a job by it's ID
     * @param int
     */
    public function delete($jobId)
    {
        Job::findOrFail($jobId)->delete();
    }
}
