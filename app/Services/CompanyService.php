<?php

namespace App\Services;


use App\Repositories\CompanyRepository;

class CompanyService
{

    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function add($company)
    {
        return $this->companyRepository->create($company);
    }

    public function edit($data, $company)
    {
        $company->update($data);
        return $company;
    }
}
