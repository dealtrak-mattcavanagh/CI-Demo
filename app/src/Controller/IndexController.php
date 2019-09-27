<?php

namespace Matt\CIDemo\Controller;

use Matt\CIDemo\Service\HtmlResponseService;
use Matt\CIDemo\Service\JsonResponseService;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;

class IndexController
{
    /**
     * @var HtmlResponseService
     */
    private $htmlResponseService;

    /**
     * @var JsonResponseService
     */
    private $jsonResponseService;

    /**
     * IndexController constructor.
     *
     * @param HtmlResponseService $htmlResponseService
     * @param JsonResponseService $jsonResponseService
     */
    public function __construct(
        HtmlResponseService $htmlResponseService,
        JsonResponseService $jsonResponseService
    ) {
        $this->htmlResponseService = $htmlResponseService;
        $this->jsonResponseService = $jsonResponseService;
    }

    /**
     * @param RequestInterface $request
     *
     * @return HtmlResponse
     */
    public function index(RequestInterface $request)
    {
        return $this->htmlResponseService->generateResponse("foo");
    }

    /**
     * @param RequestInterface $request
     *
     * @return JsonResponse
     */
    public function jsonIndex(RequestInterface $request)
    {
        $body = ["foo" => "test"];

        return $this->jsonResponseService->generateResponse($body);
    }
}
