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
        GetCompaniesAction $getCompanies, 
        Company $Company
    ): JsonResponse {
        return response()->json($getCompanies->handle($Company), Response::HTTP_OK);
    }

    public function store(
        StoreCompanyAction $storeCompany, 
        CompanyRequest $request, 
        Company $Company
    ): JsonResponse {
        return response()->json(
            $storeCompany->handle($Company, $request->all()),
            Response::HTTP_CREATED
        );
    }

    public function show(
        ShowCompanyAction $showCompany, 
        Company $Company
    ): JsonResponse {
        return response()->json(
            $showCompany->handle($Company),
            Response::HTTP_OK
        );
    }

    public function update(
        UpdateCompanyAction $updateCompany, 
        CompanyRequest $request, 
        Company $Company
    ): JsonResponse {
        return response()->json(
            $updateCompany->handle($Company, $request->all()),
            Response::HTTP_OK
        );
    }

    public function destroy(
        DeleteCompanyAction $deleteCompany, 
        Company $Company
    ): JsonResponse {
        return response()->json(
            $deleteCompany->handle($Company),
            Response::HTTP_OK
        );
    }
}