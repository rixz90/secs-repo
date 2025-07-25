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
        protected readonly Twig $view,
        protected ContainerInterface $container
    ) {}
    public function index(Request $request, Response $response): ResponseInterface
    {
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location.html.twig', ["locations" => $loc]);
    }
    public function create(Request $request, Response $response): ResponseInterface
    {
        $this->container->get(Location::class)->createLocation();
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location.html.twig', ["locations" => $loc]);
    }
    public function update(Request $request, Response $response): ResponseInterface
    {
        $this->container->get(Location::class)->update();
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location.html.twig', ["locations" => $loc]);
    }
    public function delete(Request $request, Response $response): ResponseInterface
    {
        $this->container->get(Location::class)->delete();
        $loc = $this->container->get(Location::class)->fetchAllLocations();
        return $this->view->render($response, '@tables/location.html.twig', ["locations" => $loc]);
    }
    public function edit(Request $request, Response $response): ResponseInterface
    {
        $loc = $this->container->get(Location::class)->fetchLocationById(htmlspecialchars($request->getAttribute('id')));
        if (empty($loc)) {
            return $this->view->render($response, '@tables/location.html.twig', ["error" => 'Id not found']);
        }
        $arr['locations'] = $loc;
        $arr['method'] = "PUT";
        return $this->view->render($response, '@panels/locationPanel.html.twig', $arr);
    }
    public function list(Request $request, Response $response): ResponseInterface
    {
        $loc = $this->container->get(Location::class)->fetchList();
        return $this->view->render($response, '@lists/locationListForm.html.twig', ["locations" => $loc]);
    }
}
