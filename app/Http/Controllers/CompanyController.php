<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CompanyRepositoryInterface;


class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->companyRepository->all();
        dd($companies);
        return view('Companies.all', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCompany = $request->validate([
            'companyName' => 'required|string|min:1|max:150',
            'description' => 'required|string|min:1|max:250',
            'address' => 'required|string|min:1|max:150',
            'email' => 'required|email|unique:companies,email'
        ]);

        $isStored = $this->companyRepository->create($newCompany);

        if($isStored === true) {
            return redirect('/companies')->with('success', 'Company sucssesfully created');
        }
        else {
            return back()->withErrors()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function show($companyId)
    {
        $company = $this->companyRepository->show($companyId);
        return view('Companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function edit($companyId)
    {
        $company = $this->companyRepository->show($companyId);
        return view('Companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $companyId)
    {
        $updated_company = $request->validate([
            'companyName' => 'required|string|min:1|max:150',
            'description' => 'required|string|min:1|max:250',
            'address'=> 'required|string|min:1|max:150',
            'email' => 'required|email|unique:companies,email,'.$companyId.',id'
        ]);

        $this->companyRepository->update($companyId, $updated_company);

        return redirect('/companies')->with('success', 'Company successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $companyId)
    {
        $this->companyRepository->delete(companyId);
        return redirect('/companies')->with('success', 'Company successfully deleted.');
    }
}
