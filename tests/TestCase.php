<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use App\Domain\Models\Stations\Station;
use App\Domain\Models\Companies\Company;
use App\Domain\Repositories\Stations\StationRepository;
use App\Domain\Repositories\Companies\CompanyRepository;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');

        $this->station = new Station();
        $this->stationRepository = new StationRepository($this->station);

        $this->company = new Company();
        $this->companyRepository = new CompanyRepository($this->company);
    }
}