<?php

namespace Matt\CIDemo\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Matt\CIDemo\Service\ResponseService;
use Zend\Diactoros\Response;

class HttpMessageServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        Response::class,
        ResponseService::class
    ];

    public function register()
    {
        $this->getContainer()->add(Response::class);
        $this->getContainer()->add(ResponseService::class);
    }
}
