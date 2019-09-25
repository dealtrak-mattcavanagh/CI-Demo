<?php

use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use Matt\CIDemo\Controller\IndexController;

$strategy = (new ApplicationStrategy)->setContainer($container);
$router = (new Router)->setStrategy($strategy);

$router->map('GET', '/', IndexController::class . '::index');

return $router;
