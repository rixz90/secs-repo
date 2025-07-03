<?php
require_once('../vendor/autoload.php');
define('BASE_ROOT', dirname(__DIR__) . '/');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use App\App;

echo '<!DOCTYPE html><html><head>';
echo \App\View::make('components/common/_head', ["title" => "<%= htmlWebpackPlugin.options.title %>"]);
echo '</head><body>';

require_once('../src/app/router.php');
(new App(
  $router,
  [
    'uri' =>  $_SERVER['REQUEST_URI']
  ],
  [
    'driver' => $_ENV['DB_DRIVER'],
    'host' =>
    $_ENV['DB_HOST'],
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS']
  ]
))->run();

echo '</body></html>';
