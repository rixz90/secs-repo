<?php
require_once('../vendor/autoload.php');

use App\App;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require_once('../src/router.php');

(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI']],
    [
        'DB_DRIVER' => $_ENV['DB_DRIVER'],
        'DB_HOST' => $_ENV['DB_HOST'],
        'DB_NAME' => $_ENV['DB_NAME'],
        'DB_USER' => $_ENV['DB_USER'],
        'DB_PASS' => $_ENV['DB_PASS']
    ]
))->run();
