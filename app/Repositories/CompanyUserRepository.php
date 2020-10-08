<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CompanyUserRepositoryInterface;

class CompanyUserController extends Controller
{
    private $companyUserRepository;

    public function __construct(CompanyUserRepositoryInterface $companyUserRepository)
    {
        $this->companyUserRepository = $companyUserRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        userId = auth()->user->id;

        $isStored = $this->companyUserRepository->create($newCompanyUsers);;

        if($isStored === true) {
            return redirect('/companies')->with('success', 'CompanyUsers sucssesfully created');
        }
        else {
            return back()->withErrors()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $companyId, int $userId)
    {
        $this->companyUserRepository->delete($companyId, $userId);
        // reload page
        return redirect('/companies')->with('success', 'CompanyUsers successfully deleted.');
    }
}
