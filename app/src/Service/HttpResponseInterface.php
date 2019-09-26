<?php

namespace Matt\CIDemo\Service;

use Psr\Http\Message\ResponseInterface;

interface HttpResponseInterface
{
    /**
     * @param string|array $body
     * @param int          $code
     *
     * @return ResponseInterface
     */
    public function generateResponse($body, $code = 200);
}
