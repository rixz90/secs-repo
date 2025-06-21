<?php
require_once('../vendor/autoload.php');

use App\App;
use App\Route;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require_once('../router.php');

(new App(
    $router->getRouter(),
    ['uri' => $_SERVER['REQUEST_URI']],
    [
        'DB_DRIVER' => $_ENV['DB_DRIVER'] ?? 'mysql',
        'DB_HOST' => $_ENV['DB_HOST'],
        'DB_NAME' => $_ENV['DB_NAME'],
        'DB_USER' => $_ENV['DB_USER'],
        'DB_PASS' => $_ENV['DB_PASS']
    ]
))->run();
