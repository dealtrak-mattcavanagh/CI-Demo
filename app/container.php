<?php

use League\Container\Container;
use Matt\CIDemo\Controller\IndexController;
use Matt\CIDemo\Service\JsonResponseService;
use Matt\CIDemo\Service\HtmlResponseService;
use Matt\CIDemo\ServiceProvider\HttpMessageServiceProvider;

$container = new Container();

$container->addServiceProvider(HttpMessageServiceProvider::class);
$container->add(IndexController::class)
    ->addArgument(HtmlResponseService::class)
    ->addArgument(JsonResponseService::class);

return $container;
