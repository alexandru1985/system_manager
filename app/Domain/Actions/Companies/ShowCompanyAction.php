<?php

namespace App\Domain\Actions\Companies;

use App\Domain\Models\Companies\Company;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Companies\CompanyRepository;
use Illuminate\Database\Eloquent\Model;

class ShowCompanyAction
{
    /**
     * Show company.
     */
    public function handle(Company $company): Model
    { 
        $companyRepository = new CompanyRepository($company);

        return $companyRepository->findById($company->id);
    }
}