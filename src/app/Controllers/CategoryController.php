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
        protected Twig $view
    ) {}

    public function anyIndex(Request $request, Response $response, array $args): ResponseInterface
    {
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category', ["categories" => $cat]);
    }
    public function anyCategory(Request $request, Response $response, array $args): ResponseInterface
    {
        $cat = $this->container->get(Category::class)->fetchCategoryById(htmlspecialchars($request->getAttribute('id')));
        return $this->view->render($response, '@tables/category', ["categories" => $cat]);
    }
    public function getCategory(Request $request, Response $response, array $args): ResponseInterface
    {
        $cat = $this->container->get(Category::class)->fetchCategoryById();
        return $this->view->render($response, '@panels/category', ["categories" => $cat]);
    }
    public function postCategory(Request $request, Response $response, array $args): ResponseInterface
    {
        $response = $this->container->get(Category::class)->createCategory();
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category', ["categories" => $cat, "response" => $response]);
    }
    public function putCategory(Request $request, Response $response, array $args): ResponseInterface
    {
        $response =  $this->container->get(Category::class)->update();
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category', ["categories" => $cat, "response" => $response]);
    }
    public function deleteCategory(Request $request, Response $response, array $args): ResponseInterface
    {
        $response =  $this->container->get(Category::class)->delete();
        $cat = $this->container->get(Category::class)->fetchAllCategories();
        return $this->view->render($response, '@tables/category', ["categories" => $cat, "response" => $response]);
    }
    public function anyEdit(Request $request, Response $response, array $args): ResponseInterface
    {
        $category = $this->container->get(Category::class)->fetchCategoryById(htmlspecialchars($request->getAttribute('id')));
        if (empty($category)) {
            return $this->view->render($response, '@panels/categoryPanel', ["error" => 'Id not found']);
        }
        $arr['categories'] = $category;
        $arr['method'] = "PUT";
        return $this->view->render($response, '@panels/categoryPanel', $arr);
    }
}
