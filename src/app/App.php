<?php

declare(strict_types=1);

namespace App;

use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Dispatcher;
use App\DB;
use App\View;

class App
{
    private static DB $db;

    public function __construct(
        protected Route $router,
        protected array $request,
        protected array $config
    ) {
        static::$db = new DB($config);
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

    public static function db(): DB
    {
        return static::$db;
    }
}
