<?php

namespace Matt\CIDemo\Service;

use Zend\Diactoros\Response\HtmlResponse;

class ResponseService
{
    public function generateResponse($body)
    {
        $response = new HtmlResponse(
            $body,
            200
        );

        return $response;
    }
}
