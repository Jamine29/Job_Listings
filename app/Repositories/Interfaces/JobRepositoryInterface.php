<?php

namespace App\Repositories\Interfaces;

use App\Models\Job;

interface JobRepositoryInterface
{
    /**
     * Returns all jobs.
     * 
     * @return mixed
     */
    public function all();

    /**
     * Returns a job.
     * 
     * @param  Job  $job
     */
    public function show(Job $job);

    /**
     * Create a job.
     * 
     * @param  array  $newJob
     */
    public function create(array $newJob);

    /**
     * Update a job.
     * 
     * @param  Job  $job
     * @param  array  $updatedJob
     */
    public function update(Job $job, array $updatedJob);

    /**
     * Delete a job.
     * 
     * @param  Job  $job 
     */
    public function delete(Job $job);
}
