<?php

namespace Laravel\Telegram\Request\Factory;

/**
 * The base factory class for a fluent API design.
 */
abstract class RequestFactory
{
    /**
     * The factory params.
     *
     * @var array
     */
    protected $params = [];

    /**
     * Indicates if the request is asynchronous (non-blocking).
     *
     * @var bool
     */
    protected $async = false;

    public function __construct($bot)
    {
        $this->bot = $bot;
    }

    /**
     * Set the request to non-blocking.
     *
     * @return \Laravel\Telegram\Request\Factory\RequetsFactory
     */
    public function async()
    {
        $this->async = true;

        return $this;
    }

    /**
     * Send the request.
     *
     * @return mixed
     */
    public function send()
    {
        $response = $this->bot->send(class_basename($this), $this->params);

        return $response;
    }

    public function __call(string $name, array $arguments)
    {
        // media -> sendMediaGroup

        // reply_markup

        $this->params[snake_case($name)] = count($arguments) ? $arguments[0] : true;

        return $this;
    }
}
