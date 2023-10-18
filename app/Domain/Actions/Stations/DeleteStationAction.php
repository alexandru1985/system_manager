<?php

namespace App\Domain\Actions\Stations;

use App\Domain\Models\Stations\Station;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Repositories\Stations\StationRepository;
use Illuminate\Database\Eloquent\Model;

class DeleteStationAction
{
    /**
     * Delete station.
     */
    public function handle(Station $station): array
    { 
        $stationRepository = new StationRepository($station);
        $stationRepository->deleteById($station->id);

        return [
            "message" => "Station was deleted."
        ];
    }
}