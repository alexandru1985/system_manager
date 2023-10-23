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
    public function index(
        GetStationsAction $getStationsAction,
        Station $station
    ): JsonResponse {
        return response()->json($getStationsAction->handle($station), Response::HTTP_OK);
    }

    public function store(
        StoreStationAction $storeStationAction, 
        StationRequest $stationRequest, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $storeStationAction->handle($station, $stationRequest->all()),
            Response::HTTP_CREATED
        );
    }

    public function show(
        ShowStationAction $showStationAction, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $showStationAction->handle($station),
            Response::HTTP_OK
        );
    }

    public function update(
        UpdateStationAction $updateStationAction, 
        StationRequest $stationRequest, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $updateStationAction->handle($station, $stationRequest->all()),
            Response::HTTP_OK
        );
    }

    public function destroy(
        DeleteStationAction $deleteStationAction, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $deleteStationAction->handle($station),
            Response::HTTP_OK
        );
    }

    public function getFilteredStations(
        GetFilteredStationsAction $getfilteredStationsAction,
        FilteredStationRequest $filteredStationRequest,
        Station $station,
    ): JsonResponse {
        return response()->json(
            $getfilteredStationsAction->handle($station, $filteredStationRequest->all()),
            Response::HTTP_OK
        );
    }
}