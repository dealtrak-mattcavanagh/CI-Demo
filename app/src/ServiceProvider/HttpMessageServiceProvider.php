<?php

namespace Matt\CIDemo\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Matt\CIDemo\Service\JsonResponseService;
use Matt\CIDemo\Service\HtmlResponseService;
use Zend\Diactoros\Response;

class HttpMessageServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        Response::class,
        HtmlResponseService::class,
        JsonResponseService::class
    ];

    public function register()
    {
        $this->getContainer()->add(Response::class);
        $this->getContainer()->add(HtmlResponseService::class);
        $this->getContainer()->add(JsonResponseService::class);
    }
}
