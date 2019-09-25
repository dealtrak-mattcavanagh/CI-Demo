<?php

namespace Matt\CIDemo\Controller;

use Matt\CIDemo\Service\ResponseService;
use Psr\Http\Message\RequestInterface;

class IndexController
{
    private $responseService;

    public function __construct(ResponseService $fooService)
    {
        $this->responseService = $fooService;
    }

    public function index(RequestInterface $request)
    {
        $body = "Foobar!!!!";

        return $this->responseService->generateResponse($body);
    }
}
