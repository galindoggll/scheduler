<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{

    protected $companyService;

    /**
     * Create a new controller instance.
     *
     * @param CompanyService $companyService
     * @internal param CompanyService $departmentService
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $filteredRequest = $request->only('name', 'contact_no', 'email', 'business_permit', 'address');
        return new CompanyResource($this->companyService->add($filteredRequest));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCompanyRequest|Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        $filteredRequest = $request->only('name', 'contact_no', 'email', 'business_permit', 'address');
        return new CompanyResource($this->companyService->edit($filteredRequest, $company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
