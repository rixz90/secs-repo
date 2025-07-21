<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Location;
use App\View;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;

class LocationController
{
    public function __construct(
        protected Twig $view,
        protected ContainerInterface $container
    ) {}

    public function anyIndex(Request $request, Response $response): ResponseInterface
    {
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location', ["locations" => $loc]);
    }

    public function getLocation(Request $request, Response $response): ResponseInterface
    {
        $loc = $this->container->get(Location::class)->fetchList();
        return $this->view->render($response, '@lists/locationListForm', ["locations" => $loc]);
    }

    public function postLocation(Request $request, Response $response): ResponseInterface
    {
        $response = $this->container->get(Location::class)->createLocation();
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location', ["locations" => $loc, "response" => $response]);
    }

    public function putLocation(Request $request, Response $response): ResponseInterface
    {
        $response =  $this->container->get(Location::class)->update();
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location', ["locations" => $loc, "response" => $response]);
    }

    public function deleteLocation(Request $request, Response $response): ResponseInterface
    {
        $response =  $this->container->get(Location::class)->delete();
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location', ["locations" => $loc, "response" => $response]);
    }

    public function anyEdit(Request $request, Response $response): ResponseInterface
    {
        $loc = $this->container->get(Location::class)->fetchLocationById(htmlspecialchars($request->getAttribute('id')));
        if (empty($loc)) {
            return $this->view->render($response, '@tables/location', ["error" => 'Id not found']);
        }
        $arr['locations'] = $loc;
        $arr['method'] = "PUT";
        return $this->view->render($response, '@panels/locationPanel', $arr);
    }
}
