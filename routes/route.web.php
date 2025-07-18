<?php

use App\Controller\SecurityController;

$routes = [
    '/' => [
        'controller' => SecurityController::class,
        'methode' => 'index'
    ],
    '/auth' => [
        'controller' => SecurityController::class,
        'methode' => 'store'
    ],
];
