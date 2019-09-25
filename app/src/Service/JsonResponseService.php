<?php

namespace Matt\CIDemo\Service;

use Zend\Diactoros\Response\JsonResponse;

class JsonResponseService
{
    public function generateResponse($body)
    {
        $response = new JsonResponse(
            $body,
            200,
            ['Content-Type' => ['application/json']]
        );

        return $response;
    }
}
