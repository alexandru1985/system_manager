<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\Response;

class StationControllerTest extends TestCase
{
    public function testStationsAreListed() 
    {
        $firstStation = $this->stationRepository->first();
        $lastStation = $this->stationRepository->last();

        $this->json('get', 'api/stations')
            ->assertStatus(Response::HTTP_OK)
            ->assertSee($firstStation->name, false)
            ->assertSee($lastStation->name, false);
    }

    public function testStationIsRetreived() 
    {
        $firstStation = $this->stationRepository->first();

        $this->json('get', 'api/stations/' . $firstStation->id)
            ->assertStatus(Response::HTTP_OK)
            ->assertSee($firstStation->name, false);
    }

    
    public function testStationIsCreated()
    {
        $initialStations = $this->stationRepository->count();

        $payload = [
            "company_id" => 1, 
            "name" => "Station created", 
            "latitude" => 51.580434,
            "longitude" => -0.111978,
            "address" => "Address created"
        ];

        $this->json('post', 'api/stations/', $payload)
            ->assertStatus(Response::HTTP_CREATED);

        $currentStations = $this->stationRepository->count();

        $this->assertEquals($initialStations + 1, $currentStations);
    }

    public function testStationIsUpdated()
    {
        $firstStation = $this->stationRepository->first();

        $payload = [
            "company_id" => 1, 
            "name" => "Station updated", 
            "latitude" => 51.580434,
            "longitude" => -0.111978,
            "address" => "Address updated"
        ];

        $this->json('put', 'api/stations/'. $firstStation->id, $payload)
            ->assertStatus(Response::HTTP_OK);

        $firstStation = $this->stationRepository->first();
        
        $this->assertEquals($payload['name'], $firstStation->name);
    }

    public function testStationIsDeleted()
    {
        $initialStations = $this->stationRepository->count();
        $firstStation = $this->stationRepository->first();

        $this->json('delete', 'api/stations/'. $firstStation->id)
            ->assertStatus(Response::HTTP_OK);

        $currentStations = $this->stationRepository->count();

        $this->assertEquals($initialStations - 1, $currentStations);
    }

    public function testfilteredStationsAreListed()
    {  
        $payload = [
            "company_id" => 1, 
            "latitude" => 51.5804224,
            "longitude" => -0.1119313,
            "distance" => 50
        ];

        $allFilteredStations = $this->stationRepository->filterStations($payload);
        $getAllLocations = array_keys($allFilteredStations);
        $firstLocation = current($getAllLocations);
        $lastLocation = end($getAllLocations);

        $this->json('get', 'api/stations/filter', $payload)
            ->assertStatus(Response::HTTP_OK)
            ->assertSee($allFilteredStations[$firstLocation][0]['name'], false)
            ->assertSee($allFilteredStations[$lastLocation][0]['name'], false);
    }
}