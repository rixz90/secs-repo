<?php
require_once('../vendor/autoload.php');
define('BASE_ROOT', dirname(__DIR__) . '/');

use App\App;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = new \App\Config($_ENV);
(new App($config))->run();
