<?php

declare(strict_types=1);

namespace App;

use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Dispatcher;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use App\View;
use Twig\Environment;

class App
{
    private static EntityManager $entityManager;
    private static Environment $twig;

    public function __construct(
        protected Route $router,
        protected array $request,
        protected array $dbConfig
    ) {

        $entityPath = $_SERVER['PWD'] . $_ENV['ENTITY_PATH'];

        if (!is_dir($entityPath)) {
            throw new \Exception("Directory entities not found");
        }

        $ORMconfig = ORMSetup::createAttributeMetadataConfiguration([$entityPath], (bool)$_ENV['DEV_MODE']);
        $conn = DriverManager::getConnection($dbConfig, $ORMconfig);
        $manager = new EntityManager($conn, $ORMconfig);
        $loader = new \Twig\Loader\FilesystemLoader();
        require('templateLoad.php');
        $twig = new \Twig\Environment($loader, [
            'cache' => $_SERVER['PWD'] . $_ENV['TWIG_CACHE'],
            'debug' => (bool)$_ENV['DEV_MODE'],
        ]);
        static::$entityManager = $manager;
        static::$twig = $twig;
    }

    public function run(): void
    {
        $path = parse_url($this->request['uri'], PHP_URL_PATH);
        $dispatcher = new Dispatcher($this->router->getData());

        try {
            echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $path);
        } catch (HttpRouteNotFoundException) {
            http_response_code(404);
            echo View::make('404');
        } catch (\Exception $e) {
            http_response_code(500);
            throw new \Exception(
                'An error occurred while processing your request: ' . $e->getMessage(),
                0,
                $e
            );
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
