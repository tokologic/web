<?php

namespace App\Http\Controllers;

use App\DataTables\CompaniesDataTable;
use App\Http\Requests\CompanyRequest;
use App\Model\Company;
use App\Traits\Crud;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    use Crud;

    /**
     * Display a listing of the resource.
     *
     * @param CompaniesDataTable $dataTable
     * @return mixed
     */
    public function index(CompaniesDataTable $dataTable)
    {
        return $dataTable->render('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     */
    public function store(CompanyRequest $request)
    {
        $data = $this->gatherRequest(Company::class, $request);
        Company::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Company $company
     */
    public function update(Request $request, Company $company)
    {
        $data = $this->gatherRequest(Company::class, $request);
        $company->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return void
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
        } catch (\Exception $e) {
        }
    }
}
