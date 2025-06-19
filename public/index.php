<?php
   define('BASE_PATH', dirname(__DIR__));
   define ("SRC_PATH", BASE_PATH . '/src');
   define ('PUBLIC_PATH', BASE_PATH . '/public');
   define ('APP_PATH', SRC_PATH . '/app');
   define ('VIEW_PATH', APP_PATH . '/Views');
   define ('CONTROLLER_PATH', APP_PATH . '/Controllers');
   define ('COMPONENTS_PATH', SRC_PATH . '/components');
   define('AUTOLOAD_PATH', BASE_PATH . '/vendor/autoload.php');

   require '../router.php'; 
