<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{

    public function create($company)
    {
        return Company::create($company);
    }
}
