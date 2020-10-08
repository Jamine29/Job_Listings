<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\JobRepositoryInterface;

class JobController extends Controller
{
    private $jobRepository;

    public function __construct(JobRepositoryInterface $jobRepository)
    {
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
        // id oben übergeben

        $newJob = $request->validate([
            'title' => 'required|string|min:2|max:150',
            'description' => 'required|string|min:2|max:250',
            'companyId' => 'required|integer' 
        ]);
        
        $isStored = $this->jobRepository->create($newJob);

        if($isStored === true) {
            return redirect('/jobs')->with('success', 'Job sucssesfully created');
        }
        else {
            return back()->withErrors()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = $this->jobRepository->show($id);
        return view('Jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = $this->jobRepository->show($id);
        return view('Jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedJob = $request->validate([
            'title' => 'required|string|min:2|max:150',
            'description' => 'required|string|min:2|max:250',
            'companyId' => 'required|integer'
        ]);

        $this->jobRepository->update($id, $updatedJob);
        
        return redirect('/jobs')->with('success', 'Job successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->jobRepository->delete($id);
        return redirect('/jobs');
    }
}
