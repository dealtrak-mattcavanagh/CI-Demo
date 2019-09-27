<?php

namespace spec\Matt\CIDemo\Controller;

use Matt\CIDemo\Controller\IndexController;
use Matt\CIDemo\Service\HtmlResponseService;
use Matt\CIDemo\Service\JsonResponseService;
use PhpSpec\ObjectBehavior;
use Zend\Diactoros\Request;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;

class IndexControllerSpec extends ObjectBehavior
{
    private $htmlBody = 'foo';
    private $jsonBody = ['foo' => 'test2'];

    function let(
        HtmlResponseService $htmlResponseService,
        JsonResponseService $jsonResponseService
    ) {
        $htmlResponseService->generateResponse($this->htmlBody)->willReturn(new HtmlResponse($this->htmlBody));
        $jsonResponseService->generateResponse($this->jsonBody)->willReturn(new JsonResponse($this->jsonBody));
        $this->beConstructedWith($htmlResponseService, $jsonResponseService);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(IndexController::class);
    }

    function it_should_call_html_response(Request $request, HtmlResponseService $htmlResponseService)
    {
        $htmlResponseService->generateResponse($this->htmlBody)->shouldBeCalled();
        $this->index($request);
    }

    function it_should_call_json_response(Request $request, JsonResponseService $jsonResponseService)
    {
        $jsonResponseService->generateResponse($this->jsonBody)->shouldBeCalled();
        $this->jsonIndex($request);
    }

    function it_should_return_successful_html_response_instance(Request $request)
    {
        $this->index($request)
            ->shouldReturnAnInstanceOf(HtmlResponse::class);
    }

    function it_should_return_successful_json_response_instance(Request $request)
    {
        $this->jsonIndex($request)
            ->shouldReturnAnInstanceOf(JsonResponse::class);
    }
}
