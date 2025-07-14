<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Location;
use App\View;

class LocationController
{
    public function anyIndex(): string
    {
        $loc = (new Location)->fetchAllLocations();
        return View::make('@tables/location', ["locations" => $loc])->render();
    }

    public function anyLocation(string $param): string
    {
        $response = (new Location)->fetchLocationById($param);
        return json_encode($response);
    }

    public function getLocation(): string
    {
        $loc = (new Location)->fetchList();
        return View::make('@lists/locationListForm', ["locations" => $loc])->render();
    }

    public function postLocation(): string
    {
        $response = (new Location)->createLocation();
        $loc = (new Location)->fetchAllLocations();
        return View::make('@tables/location', ["locations" => $loc, "response" => $response])->render();
    }

    public function putLocation(): string
    {
        $response =  (new Location)->update();
        $loc = (new Location)->fetchAllLocations();
        return View::make('@tables/location', ["locations" => $loc, "response" => $response])->render();
    }

    public function deleteLocation(): string
    {
        $response =  (new Location)->delete();
        $loc = (new Location)->fetchAllLocations();
        return View::make('@tables/location', ["locations" => $loc, "response" => $response])->render();
    }

    public function anyEdit(string $id): string
    {
        $loc = (new Location)->fetchLocationById(htmlspecialchars($id));
        if (empty($loc)) {
            return json_encode(["error" => 'Id not found']);
        }
        $arr['locations'] = $loc;
        $arr['method'] = "PUT";
        return view::make('@panels/locationPanel', $arr)->render();
    }
}
