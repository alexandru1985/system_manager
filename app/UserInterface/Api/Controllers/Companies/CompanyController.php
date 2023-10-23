<?php

namespace App\UserInterface\Api\Controllers\Companies;

use App\Infrastructure\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Domain\Actions\Companies\GetCompaniesAction;
use App\Domain\Actions\Companies\StoreCompanyAction;
use App\Domain\Actions\Companies\ShowCompanyAction;
use App\Domain\Actions\Companies\UpdateCompanyAction;
use App\Domain\Actions\Companies\DeleteCompanyAction;
use App\Domain\Models\Companies\Company;
use App\Domain\Requests\Companies\CompanyRequest;

class CompanyController extends Controller
{
    public function index(
        GetCompaniesAction $getCompaniesAction, 
        Company $company
    ): JsonResponse {
        return response()->json($getCompaniesAction->handle($company), Response::HTTP_OK);
    }

    public function store(
        StoreCompanyAction $storeCompanyAction, 
        CompanyRequest $companyRequest, 
        Company $company
    ): JsonResponse {
        return response()->json(
            $storeCompanyAction->handle($company, $companyRequest->all()),
            Response::HTTP_CREATED
        );
    }

    public function show(
        ShowCompanyAction $showCompanyAction, 
        Company $company
    ): JsonResponse {
        return response()->json(
            $showCompanyAction->handle($company),
            Response::HTTP_OK
        );
    }

    public function update(
        UpdateCompanyAction $updateCompanyAction, 
        CompanyRequest $companyRequest, 
        Company $company
    ): JsonResponse {
        return response()->json(
            $updateCompanyAction->handle($company, $companyRequest->all()),
            Response::HTTP_OK
        );
    }

    public function destroy(
        DeleteCompanyAction $deleteCompanyAction, 
        Company $company
    ): JsonResponse {
        return response()->json(
            $deleteCompanyAction->handle($company),
            Response::HTTP_OK
        );
    }
}