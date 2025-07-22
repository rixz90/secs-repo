<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Location;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface;

class ComplaintController
{
    public function __construct(
        protected Twig $view,
        protected ContainerInterface $container
    ) {}

    public function show(Request $request, Response $response, array $args): ResponseInterface
    {
        $complaints = $this->container->get(Complaint::class)->fetchById($request->getAttribute('id'));
        return $this->view->render($response, '@tables/complaint.html.twig', ['complaints' => $complaints]);
    }
    public function create(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Complaint::class)->create();
        $complaints = $this->container->get(Complaint::class)->fetchLeftJoinAll();
        return $this->view->render($response, '@tables/semakan.html.twig', ['complaints' => $complaints]);
    }
    public function update(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Complaint::class)->update();
        $complaints = $this->container->get(Complaint::class)->fetchAll();
        return $this->view->render($response, '@tables/complaint.html.twig', ['complaints' => $complaints]);
    }
    public function delete(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Complaint::class)->softDelete();
        $complaints = $this->container->get(Complaint::class)->fetchAll();
        return $this->view->render($response, '@tables/complaint.html.twig', ['complaints' => $complaints]);
    }
    public function table(Request $request, Response $response, array $args): ResponseInterface
    {
        $complaints = $this->container->get(Complaint::class)->fetchLeftJoinAll();
        return match (htmlspecialchars($request->getAttribute('type'))) {
            'semakan' => $this->view->render($response, '@tables/semakan.html.twig', ['complaints' => $complaints]),
            'admin' => $this->view->render($response, '@tables/complaint.html.twig', ["complaints" => $complaints])
        };
    }
    public function form(Request $request, Response $response, array $args): ResponseInterface
    {
        $arr = [
            'branches' => $this->container->get(Branch::class)->fetchList(),
            'categories' => $this->container->get(Category::class)->fetchList()
        ];
        return match (htmlspecialchars($request->getAttribute('type'))) {
            'ng' => $this->view->render($response, '@forms/non-guest.html.twig', $arr),
            'g' => $this->view->render($response, '@forms/base.html.twig', $arr),
            default => $this->view->render($response, '@forms/base.html.twig', ["error" => 'Form not found'])
        };
    }
    public function edit(Request $request, Response $response, array $args): ResponseInterface
    {
        $complaint = $this->container->get(Complaint::class)->fetchLeftJoinById($request->getAttribute('id'));
        if (empty($complaint)) {
            return $this->view->render($response, '@tables/complaint.html.twig', ["error" => 'Id not found']);
        }
        $arr = [
            'branches' => $this->container->get(Branch::class)->fetchList(),
            'locations' => $this->container->get(Location::class)->fetchList(),
            'categories' => $this->container->get(Category::class)->fetchList()
        ];
        $arr['complaints'] = $complaint;
        $arr['method'] = "PUT";
        return $this->view->render($response, '@forms/non-guest.html.twig', $arr);
    }
    public function locationList(Request $request, Response $response, array $args): ResponseInterface
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $branchId = filter_input(INPUT_GET, 'branch', FILTER_VALIDATE_INT);
        if (empty($id) || empty($branchId)) {
            return $this->view->render($response, '@lists/locationList.html.twig', ["error" => 'Id or Branch not found']);
        }
        $bran = $this->container->get(Branch::class)->fetchBranchById($branchId);
        $comp = $this->container->get(Complaint::class)->fetchLeftJoinById($id);
        return $this->view->render($response, '@lists/locationList.html.twig', ["branches" => $bran, "complaints" => $comp]);
    }
}
