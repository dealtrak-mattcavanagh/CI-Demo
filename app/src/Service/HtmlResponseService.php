<?php

namespace Matt\CIDemo\Service;

use Zend\Diactoros\Response\HtmlResponse;

class HtmlResponseService
{
    public function generateResponse($body, $code = 200)
    {
        $response = new HtmlResponse(
            $body,
            $code
        );

        return $response;
    }
}
