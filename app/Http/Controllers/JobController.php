<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\JobRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    private $jobRepository;

    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->authorizeResource(Job::class, 'job');
        $this->jobRepository = $jobRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = $this->jobRepository->all();
        return view('Jobs.all', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newJob = $request->validate([
            'title' => 'required|string|min:2|max:150',
            'description' => 'required|string|min:2|max:250',
            'companyId' => 'required|integer' 
        ]);
        
        $createdJobId = $this->jobRepository->create($newJob)->id;;

        if($createdJobId !== null) {
            return redirect('/jobs/'.$createdJobId)->with('success', 'Job sucssesfully created');
        }
        else {
            return back()->withErrors()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $company=$job->company()->get()[0];
        return view('Jobs.show', compact(['job','company']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('Jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $updatedJob = $request->validate([
            'title' => 'required|string|min:2|max:150',
            'description' => 'required|string|min:2|max:250',
            'companyId' => 'required|integer'
        ]);

        $this->jobRepository->update($job, $updatedJob);
        return redirect('/jobs/'.$job->id)->with('success', 'Job successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $this->jobRepository->delete($job);
        return redirect('/home')->with('success', 'Job successfully deleted.');
    }
}
