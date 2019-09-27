<?php

namespace Matt\CIDemo\Service;

use Zend\Diactoros\Response\HtmlResponse;

class HtmlResponseService implements HttpResponseInterface
{
    /**
     * @inheritDoc
     */
    public function generateResponse($body, $code = 200)
    {
        $response = new HtmlResponse(
            $body,
            $code
        );

        return $response;
    }
}
