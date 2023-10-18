<?php

namespace App\Domain\Actions\Companies;

use App\Domain\Models\Companies\Company;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Companies\CompanyRepository;
use Illuminate\Database\Eloquent\Model;

class DeleteCompanyAction
{
    /**
     * Delete company.
     */
    public function handle(Company $company): array
    { 
        $companyRepository = new CompanyRepository($company);
        $companyRepository->deleteById($company->id);

        return [
            "message" => "Company was deleted."
        ];
    }
}