<?php

namespace spec\Matt\CIDemo\ServiceProvider;

use League\Container\Container;
use League\Container\ServiceProvider\ServiceProviderInterface;
use Matt\CIDemo\Service\HtmlResponseService;
use Matt\CIDemo\Service\JsonResponseService;
use Matt\CIDemo\ServiceProvider\HttpMessageServiceProvider;
use PhpSpec\ObjectBehavior;
use Zend\Diactoros\Response;

class HttpMessageServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HttpMessageServiceProvider::class);
    }

    function it_implements_service_provider_interface()
    {
        $this->shouldImplement(ServiceProviderInterface::class);
    }

    function it_adds_services_to_container(Container $container)
    {
        $this->getContainer()->add(Response::class)->shouldBeCalled();
        $this->getContainer()->add(HtmlResponseService::class)->shouldBeCalled();
        $this->getContainer()->add(JsonResponseService::class)->shouldBeCalled();
        $this->register();
    }
}
