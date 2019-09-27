<?php

namespace spec\Matt\CIDemo\Service;

use Matt\CIDemo\Service\HtmlResponseService;
use Matt\CIDemo\Service\HttpResponseInterface;
use PhpSpec\ObjectBehavior;
use Zend\Diactoros\Response\HtmlResponse;

class HtmlResponseServiceSpec extends ObjectBehavior
{
    private $htmlBody = 'foo';

    function it_is_initializable()
    {
        $this->shouldHaveType(HtmlResponseService::class);
    }

    function it_should_implement_http_response_interface()
    {
        $this->shouldImplement(HttpResponseInterface::class);
    }

    function it_should_generate_correct_response_instance_type()
    {
        $this->generateResponse($this->htmlBody)->shouldReturnAnInstanceOf(HtmlResponse::class);
    }
}
