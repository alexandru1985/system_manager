<?php

namespace App\Domain\Repositories\Stations;

use App\Domain\Repositories\BaseRepository;
use DB;

class StationRepository extends BaseRepository
{
    public function filterStations(array $data): array
    {
        $haversine = "(
            6371 * acos(
                cos(radians(" . $data['latitude'] . "))
                * cos(radians(`latitude`))
                * cos(radians(`longitude`) - radians(" . $data['longitude'] . "))
                + sin(radians(" . $data['latitude'] . ")) * sin(radians(`latitude`))
            )
        )";

        $moreStationsOnLocationByCompany = DB::table('stations')
            ->select('id', 'company_id', 'name', 'latitude' ,'longitude')
            ->where('company_id', $data['company_id'])
            ->whereIn('latitude', function ($q) {
                $q->select('latitude')
                ->from('stations')
                ->groupBy('latitude')
                ->havingRaw('count(*) > 1');           
            });

        /*
        * Union one station on location with more stations on location filtered by company.
        */
        $allStationsAndLocations = DB::table('stations')
            ->select('id', 'company_id', 'name', 'latitude' , 'longitude')
            ->where('company_id', $data['company_id'])
            ->whereNotIn('id', $moreStationsOnLocationByCompany
            ->selectRaw("{$haversine} as distance")->get()->pluck('id'))
            ->union($moreStationsOnLocationByCompany);
        
        $filterStationsOnLocationByDistance = $allStationsAndLocations 
            ->selectRaw("{$haversine} as distance")
            ->havingRaw("distance <= " . $data['distance'])
            ->orderBy('distance',"asc")
            ->get()->toArray();

        return $this->groupStationsToEachLocation($filterStationsOnLocationByDistance);
    }

    public function groupStationsToEachLocation(array $stations): array 
    {
        $result = [];
        $latitude = 'latitude';
        $longitude = 'longitude';
        $location = 'location';

        foreach ($stations as $station) {
            $station = (array) $station;

            if (array_key_exists($latitude, $station)) {
                $result[$location. '_' . $latitude . '_'. $station[$latitude] . '_and_' . $longitude . '_' . $station[$longitude]][] = $station;
            } else {
                $result[''][] = $station;
            }
        }

        return $result;
    }
}