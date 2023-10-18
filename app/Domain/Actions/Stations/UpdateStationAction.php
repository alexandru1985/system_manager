<?php

namespace App\Domain\Actions\Stations;

use App\Domain\Models\Stations\Station;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Stations\StationRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateStationAction
{
    /**
     * Update station.
     */
    public function handle(Station $station, array $data): Model
    { 
        $stationRepository = new StationRepository($station);
        $stationRepository->update($station->id, $data);

        return $stationRepository->findById($station->id);
    }
}