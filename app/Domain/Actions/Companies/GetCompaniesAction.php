<?php

namespace App\Domain\Actions\Companies;

use App\Domain\Models\Companies\Company;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Companies\CompanyRepository;

class GetCompaniesAction
{
    /**
     * Get all companies.
     */
    public function handle(Company $company): Collection
    { 
        $companyRepository = new CompanyRepository($company);

        return $companyRepository->all();
    }
}