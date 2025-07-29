<?php

declare(strict_types=1);

return [
    BASE_ROOT . $env['VIEW_PATH'],
    'common' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@common',
    'panels' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@panels',
    'layouts' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@layouts',
    'tables' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@tables',
    'forms' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@forms',
    'lists' => BASE_ROOT . $env['VIEW_PATH'] . '/components/@lists'
];
