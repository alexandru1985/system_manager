<?php

namespace App\Domain\Actions\Stations;

use App\Domain\Models\Stations\Station;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Stations\StationRepository;

class GetFilteredStationsAction
{
    /**
     * Get all filtered stations by company, location and distance 
     */
    public function handle(Station $station, array $data): array
    { 
        $stationRepository = new StationRepository($station);

        return $stationRepository->filterStations($data);
    }
}