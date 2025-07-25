<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Branch;
use App\Models\Location;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface;

class BranchController
{
    public function __construct(
        protected ContainerInterface $container,
        protected readonly Twig $view
    ) {}
    public function index(Request $request, Response $response, array $args): ResponseInterface
    {
        $branches = $this->container->get(Branch::class)->fetchAllBranches();
        return $this->view->render($response, '@tables/branch.html.twig', ["branches" => $branches]);
    }
    public function create(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Branch::class)->create();
        $branches = $this->container->get(Branch::class)->fetchAllBranches();
        return $this->view->render($response, '@tables/branch.html.twig', ["branches" => $branches]);
    }
    public function update(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Branch::class)->update();
        $branches = $this->container->get(Branch::class)->fetchAllBranches();
        return $this->view->render($response, '@tables/branch.html.twig', ["branches" => $branches]);
    }
    public function delete(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Branch::class)->delete();
        $branches = $this->container->get(Branch::class)->fetchAllBranches();
        return $this->view->render($response, '@tables/branch.html.twig', ['branches' => $branches]);
    }
    public function edit(Request $request, Response $response, array $args): ResponseInterface
    {
        $bran = $this->container->get(Branch::class)->fetchBranchById(htmlspecialchars($request->getAttribute('id')));
        $loc = $this->container->get(Location::class)->fetchList();
        if (empty($bran)) {
            return $this->view->render($response, '@panels/branchPanel.html.twig', ["error" => 'Id not found']);
        }
        $arr['branches'] = $bran;
        $arr['locations'] = $loc;
        $arr['method'] = "PUT";
        return $this->view->render($response, '@panels/branchPanel.html.twig', $arr);
    }
    public function locationList(Request $request, Response $response, array $args): ResponseInterface
    {
        $branchId = filter_input(INPUT_GET, 'branch', FILTER_VALIDATE_INT);
        if (empty($branchId)) {
            return $this->view->render($response, '@lists/locationListForm.html.twig', ["error" => 'Branch ID is not provided']);
        }
        $branches = $this->container->get(Branch::class)->fetchBranchById($branchId);
        $locations = $branches[0]['locations'];
        return $this->view->render($response, '@lists/locationListForm.html.twig', ["locations" => $locations]);
    }
}
