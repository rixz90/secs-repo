<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Category;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface;

class CategoryController
{
    public function __construct(
        protected ContainerInterface $container,
        protected readonly Twig $view
    ) {}

    public function index(Request $request, Response $response, array $args): ResponseInterface
    {
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category.html.twig', ["categories" => $cat]);
    }
    public function show(Request $request, Response $response, array $args): ResponseInterface
    {
        $cat = $this->container->get(Category::class)->fetchCategoryById();
        return $this->view->render($response, '@panels/category.html.twig', ["categories" => $cat]);
    }
    public function create(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Category::class)->createCategory();
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category.html.twig', ["categories" => $cat, "response" => $response]);
    }
    public function update(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Category::class)->update();
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category.html.twig', ["categories" => $cat, "response" => $response]);
    }
    public function delete(Request $request, Response $response, array $args): ResponseInterface
    {
        $this->container->get(Category::class)->delete();
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category.html.twig', ["categories" => $cat, "response" => $response]);
    }
    public function edit(Request $request, Response $response, array $args): ResponseInterface
    {
        $category = $this->container->get(Category::class)->fetchCategoryById(htmlspecialchars($request->getAttribute('id')));
        if (empty($category)) {
            return $this->view->render($response, '@panels/categoryPanel.html.twig', ["error" => 'Id not found']);
        }
        $arr['categories'] = $category;
        $arr['method'] = "PUT";
        return $this->view->render($response, '@panels/categoryPanel.html.twig', $arr);
    }
}
