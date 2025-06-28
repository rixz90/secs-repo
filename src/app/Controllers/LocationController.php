<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Location;

class LocationController
{
    public function anyIndex(): string
    {
        $response = (new Location)->fetchAllLocations();
        return json_encode($response);
    }

    public function anyLocation(string $param): string
    {
        $response = (new Location)->fetchLocationById($param);
        return json_encode($response);
    }

    public function getLocation(): string
    {
        $response = (new Location)->fetchLocationById();
        return json_encode($response);
    }

    public function postLocation(): string
    {
        $response = (new Location)->createLocation();
        return json_encode($response);
    }

    public function putLocation(): string
    {
        $response =  (new Location)->updateLocation();
        return json_encode($response);
    }

    public function deleteLocation(): string
    {
        $response =  (new Location)->dropLocation();
        return json_encode($response);
    }
}
