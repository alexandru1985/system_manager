<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\Response;

class CompanyControllerTest extends TestCase
{
    public function testCompaniesAreListed() 
    {
        $firstCompany = $this->companyRepository->first();
        $lastCompany = $this->companyRepository->last();

        $this->json('get', 'api/companies')
            ->assertStatus(Response::HTTP_OK)
            ->assertSee($firstCompany->name)
            ->assertSee($lastCompany->name);
    }

    public function testCompanyIsRetreived() 
    {
        $firstCompany = $this->companyRepository->first();

        $this->json('get', 'api/companies/' . $firstCompany->id)
            ->assertStatus(Response::HTTP_OK)
            ->assertSee($firstCompany->name);
    }

    
    public function testCompanyIsCreated()
    {
        $initialCompanies = $this->companyRepository->count();

        $payload = [
            "name" => "Company created", 
        ];

        $this->json('post', 'api/companies/', $payload)
            ->assertStatus(Response::HTTP_CREATED);

        $currentCompanies = $this->companyRepository->count();

        $this->assertEquals($initialCompanies + 1, $currentCompanies);
    }

    public function testCompanyIsUpdated()
    {
        $firstCompany = $this->companyRepository->first();

        $payload = [
            "name" => "Company updated", 
        ];

        $this->json('put', 'api/companies/'. $firstCompany->id, $payload)
            ->assertStatus(Response::HTTP_OK);

        $firstCompany = $this->companyRepository->first();
        
        $this->assertEquals($payload['name'], $firstCompany->name);
    }

    public function testCompanyIsDeleted()
    {
        $initialCompanies = $this->companyRepository->count();
        $firstCompany = $this->companyRepository->first();

        $this->json('delete', 'api/companies/'. $firstCompany->id)
            ->assertStatus(Response::HTTP_OK);

        $currentCompanies = $this->companyRepository->count();

        $this->assertEquals($initialCompanies - 1, $currentCompanies);
    }
}