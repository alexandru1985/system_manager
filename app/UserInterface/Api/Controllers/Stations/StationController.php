<?php

namespace App\UserInterface\Api\Controllers\Stations;

use App\Infrastructure\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Domain\Actions\Stations\GetStationsAction;
use App\Domain\Actions\Stations\StoreStationAction;
use App\Domain\Actions\Stations\ShowStationAction;
use App\Domain\Actions\Stations\UpdateStationAction;
use App\Domain\Actions\Stations\DeleteStationAction;
use App\Domain\Models\Stations\Station;
use App\Domain\Requests\Stations\StationRequest;

class StationController extends Controller
{
    public function index(GetStationsAction $getStations, Station $station): JsonResponse
    {
        return response()->json($getStations->handle($station), Response::HTTP_OK);
    }

    public function store(
        StoreStationAction $storeStation, 
        StationRequest $request, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $storeStation->handle($station, $request->all()),
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
        StationRequest $request, 
        Station $station
    ): JsonResponse {
        return response()->json(
            $updateStation->handle($station, $request->all()),
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
}