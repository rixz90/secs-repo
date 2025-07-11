<?php

$viewPath = BASE_ROOT . $_ENV['VIEW_PATH'];
$loader->addPath($viewPath);
$loader->addPath($viewPath . '/components/@common', 'common');
$loader->addPath($viewPath . '/components/@panels', 'panels');
$loader->addPath($viewPath . '/components/@layouts', 'layouts');
$loader->addPath($viewPath . '/components/@tables', 'tables');
$loader->addPath($viewPath . '/components/@forms', 'forms');
$loader->addPath($viewPath . '/components/@lists', 'lists');
