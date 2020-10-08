<?php

namespace App\Repositories\Interfaces;

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
     * @param int
     */
    public function show(int $jobId);

    /**
     * create a job
     * @param array
     */
    public function create(array $newJob);

    /**
     * update a job by it's ID
     * @param int
     * @param array
     */
    public function update(int $jobId, array $updatedJob);

    /**
     * delete a job by it's ID
     * @param int
     */
    public function delete(int $jobId);
}
