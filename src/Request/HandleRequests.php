<?php

namespace Laravel\Telegram\Request;

trait HandleRequests
{
    /**
     * Get the full url of the endpoint for the method.
     *
     * @param string $token
     * @param string $method
     * @return string
     */
    public function getEndpoint($token, $method)
    {
        return "https://api.telegram.org/bot{$token}/{$method}";
    }
}
