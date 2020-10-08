<?php

namespace App\Repositories\Interfaces;

use App\Models\Job;

interface JobRepositoryInterface
{
    /**
     * returns all jobs
     * 
     * @return mixed
     */
    public function all();

    /**
     * returns a job by it's ID
     * @param integer $jobId
     */
    public function show(Job $job);

    /**
     * create a job
     * @param array
     */
    public function create(array $newJob);

    /**
     * update a job by it's ID
     * @param  Job  $job
     * @param array
     */
    public function update(Job $job, array $updatedJob);

    /**
     * Delete a job.
     * 
     * @param  Job  $job 
     */
    public function delete(Job $job);
}
