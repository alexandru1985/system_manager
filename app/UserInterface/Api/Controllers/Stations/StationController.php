<?php

namespace App\UserInterface\Api\Controllers\Stations;

use App\Infrastructure\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Domain\Actions\Stations\GetStationsAction;
use App\Domain\Actions\Stations\GetFilteredStationsAction;
use App\Domain\Actions\Stations\StoreStationAction;
use App\Domain\Actions\Stations\ShowStationAction;
use App\Domain\Actions\Stations\UpdateStationAction;
use App\Domain\Actions\Stations\DeleteStationAction;
use App\Domain\Models\Stations\Station;
use App\Domain\Requests\Stations\StationRequest;
use App\Domain\Requests\Stations\FilteredStationRequest;
use App\Domain\Models\Companies\Company;

class StationController extends Controller
{
    public function index(GetStationsAction $getStations, Station $station): JsonResponse
    {
        return response()->json($getStations->handle($station), Response::HTTP_OK);
    }

    public function store(
        StoreStationAction $storeStation, 
        StationRequest $stationRequest, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $storeStation->handle($station, $stationRequest->all()),
            Response::HTTP_CREATED
        );
    }

    public function show(
        ShowStationAction $showStation, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $showStation->handle($station),
            Response::HTTP_OK
        );
    }

    public function update(
        UpdateStationAction $updateStation, 
        StationRequest $stationRequest, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $updateStation->handle($station, $stationRequest->all()),
            Response::HTTP_OK
        );
    }

    public function destroy(DeleteStationAction $deleteStation, Station $station): JsonResponse
    {
        return response()->json(
            $deleteStation->handle($station),
            Response::HTTP_OK
        );
    }

    public function getFilteredStations(
        FilteredStationRequest $filteredStationRequest,
        GetFilteredStationsAction $getfilteredStations,
        Station $station,
        ) : JsonResponse {
        return response()->json(
            $getfilteredStations->handle($station, $filteredStationRequest->all()),
            Response::HTTP_OK
        );
    }
}