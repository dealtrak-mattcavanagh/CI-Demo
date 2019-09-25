<?php

use League\Container\Container;
use Matt\CIDemo\Controller\IndexController;
use Matt\CIDemo\Service\ResponseService;
use Matt\CIDemo\ServiceProvider\HttpMessageServiceProvider;

$container = new Container();

$container->addServiceProvider(HttpMessageServiceProvider::class);
$container->add(IndexController::class)
    ->addArgument(ResponseService::class);

return $container;
