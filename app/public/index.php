<?php

include __DIR__ . '/../vendor/autoload.php';

use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$container = include __DIR__ . '/../container.php';
$router = include __DIR__ . '/../router.php';

$response = $router->dispatch($request);

return (new SapiEmitter)->emit($response);
