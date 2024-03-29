<?php

namespace Matt\CIDemo\Service;

use Zend\Diactoros\Response\JsonResponse;

class JsonResponseService implements HttpResponseInterface
{
    /**
     * @inheritDoc
     */
    public function generateResponse($body, $code = 200)
    {
        $response = new JsonResponse(
            $body,
            $code,
            ['Content-Type' => ['application/json']]
        );

        return $response;
    }
}
