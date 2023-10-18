<?php

namespace App\Domain\Actions\Stations;

use App\Domain\Models\Stations\Station;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Stations\StationRepository;
use Illuminate\Database\Eloquent\Model;

class StoreStationAction
{
    /**
     * Store station.
     */
    public function handle(Station $station, array $data): Model
    { 
        $stationRepository = new StationRepository($station);

        return $stationRepository->create($data);
    }
}