<?php

namespace spec\Matt\CIDemo\Controller;

use Matt\CIDemo\Controller\IndexController;
use Matt\CIDemo\Service\HtmlResponseService;
use Matt\CIDemo\Service\JsonResponseService;
use PhpSpec\ObjectBehavior;
use Zend\Diactoros\Request;
use Zend\Diactoros\Response\HtmlResponse;

class IndexControllerSpec extends ObjectBehavior
{
    function let(
        HtmlResponseService $htmlResponseService,
        JsonResponseService $jsonResponseService
    ) {
        $this->beConstructedWith($htmlResponseService, $jsonResponseService);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(IndexController::class);
    }

    function it_should_return_html_response(Request $request)
    {
        $this->index($request)
            ->shouldReturnAnInstanceOf(HtmlResponse::class);
    }
}
