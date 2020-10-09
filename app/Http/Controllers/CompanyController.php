<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;


class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->authorizeResource(Company::class, 'company');
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
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCompany = $request->validate([
            'name' => 'required|string|min:1|max:150',
            'description' => 'required|string|min:1|max:250',
            'address' => 'required|string|min:1|max:150',
            'email' => 'required|email|unique:companies,email'
        ]);

        $createdCompanyId = $this->companyRepository->create($newCompany)->id;
        auth()->user()->companies()->attach($createdCompanyId, ['isManager' => 1]);

        if($createdCompanyId !== null) {
            return redirect('/companies/'.$createdCompanyId)->with('success', 'Company sucssesfully created');
        }
        else {
            return back()->withErrors()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $companyId
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('Companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('Companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $updatedCompany = $request->validate([
            'name' => 'required|string|min:1|max:150',
            'description' => 'required|string|min:1|max:250',
            'address'=> 'required|string|min:1|max:150',
            'email' => 'required|email|unique:companies,email,'.$company->email.',email'
        ]);

        $this->companyRepository->update($company, $updatedCompany);

        return redirect('/companies/'.$company->id)->with('success', 'Company successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->users()->detach();
        $this->companyRepository->delete($company);
        return redirect('/home')->with('success', 'Company successfully deleted.');
    }
}
