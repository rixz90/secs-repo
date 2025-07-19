<?php

declare(strict_types=1);

namespace App;

use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Twig\Environment;
use App\Config;
use App\View;

class App
{
    private static EntityManager $entityManager;
    private static $twig;
    private static $router;

    public function __construct(
        private Config $config
    ) {
        $entityPath = $_SERVER['PWD'] . $_ENV['ENTITY_PATH'];
        if (!is_dir($entityPath)) {
            throw new \Exception("Directory entities not found");
        }
        $ORMconfig = ORMSetup::createAttributeMetadataConfiguration([$entityPath], (bool)$_ENV['DEV_MODE']);
        $conn = DriverManager::getConnection($config->db, $ORMconfig);
        static::$entityManager = new EntityManager($conn, $ORMconfig);
        $loader = new \Twig\Loader\FilesystemLoader();
        require('templateLoad.php');
        static::$twig = new \Twig\Environment($loader, $config->twig);
        static::$router = new RouteCollector();
        require_once('router.php');
    }

    public function run(): void
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $dispatcher = new Dispatcher(static::$router->getData());

        try {
            echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $path);
        } catch (HttpRouteNotFoundException) {
            http_response_code(404);
            echo View::make('404');
        } catch (\Exception $e) {
            http_response_code(500);
            throw new \Exception('An error occurred while processing your request: ' . $e->getMessage());
        }
    }

    public static function entityManager(): EntityManager
    {
        return static::$entityManager;
    }

    public static function twig(): Environment
    {
        return static::$twig;
    }
}
