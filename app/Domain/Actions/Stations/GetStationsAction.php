<?php

namespace App\Domain\Actions\Stations;

use App\Domain\Models\Stations\Station;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Stations\StationRepository;

class GetStationsAction
{
    /**
     * Get all stations.
     */
    public function handle(Station $station): Collection
    { 
        $stationRepository = new StationRepository($station);

        return $stationRepository->all(['*'], ['company']);
    }
}