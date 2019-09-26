<?php

namespace spec\Matt\CIDemo\Service;

use Matt\CIDemo\Service\HttpResponseInterface;
use Matt\CIDemo\Service\JsonResponseService;
use PhpSpec\ObjectBehavior;
use Zend\Diactoros\Response\JsonResponse;

class JsonResponseServiceSpec extends ObjectBehavior
{
    private $jsonBody = ['foo' => 'bar'];

    function it_is_initializable()
    {
        $this->shouldHaveType(JsonResponseService::class);
    }

    function it_should_implement_http_response_interface()
    {
        $this->shouldImplement(HttpResponseInterface::class);
    }

    function it_should_generate_correct_response_instance_type()
    {
        $this->generateResponse($this->jsonBody)->shouldReturnAnInstanceOf(JsonResponse::class);
    }
}
