<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/path_constants.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
return require CONFIG_PATH . '/container.php';
