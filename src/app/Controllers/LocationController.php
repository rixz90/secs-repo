<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Location;
use App\View;

class LocationController
{
    public function anyIndex(): string
    {
        $response = (new Location)->fetchAllLocations();
        return (string) \App\View::make('@tables/location', ["locations" => $response]);
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

    public function getForm(): string
    {
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (isset($params['method']) == 'update' && isset($params['id'])) {
            $loc = (new Location)->fetchLocationById($params['id']);
            if (empty($loc)) {
                return json_encode(["error" => 'Id not found']);
            }
            $arr['location'] = $loc;
            $arr['method'] = "PUT";
            return View::make('@panels/locationPanel', $arr)->render();
        }
        return json_encode(["error" => 'Form not found']);
    }
}
