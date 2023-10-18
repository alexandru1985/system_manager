<?php

namespace App\Domain\Actions\Companies;

use App\Domain\Models\Companies\Company;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Companies\CompanyRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateCompanyAction
{
    /**
     * Update company.
     */
    public function handle(Company $company, array $data): Model
    { 
        $companyRepository = new CompanyRepository($company);
        $companyRepository->update($company->id, $data);

        return $companyRepository->findById($company->id);
    }
}