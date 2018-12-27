<?php

namespace Laravel\Telegram;

class TelegramManager
{

    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The array of resolved bots.
     *
     * @var array
     */
    protected $bots = [];

    /**
     * Create a new telegram manager instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get a bot instance.
     *
     * @param  string  $name
     * @return \Laravel\Telegram\TelegramBot
     */
    public function bot($name = null)
    {
        $name = $name ?: $this->getDefaultBot();

        return $this->bots[$name] = $this->get($name);
    }

    /**
     * Attempt to get the bot from the local cache.
     *
     * @param  string  $name
     * @return \Laravel\Telegram\TelegramBot
     */
    protected function get($name)
    {
        return $this->bots[$name] ?? $this->resolve($name);
    }

    /**
     * Resolve the given bot.
     *
     * @param  string  $name
     * @return \Laravel\Telegram\TelegramBot
     */
    protected function resolve($name)
    {
        // here we want to resolve token also
        if (str_contains($name, ':')) {
            foreach ($this->app['config']['telegram.bots'] as $key => $config) {
                if ($config['token'] === $name) {
                    return new TelegramBot($config['token'], $config['username']);
                }
            }
        }

        $config = $this->getConfig($name);

        return new TelegramBot($config['token'], $config['username']);
    }

    /**
     * Get the telegram bot configuration.
     *
     * @param  string  $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["telegram.bots.{$name}"];
    }

    /**
     * Get the default bot name.
     *
     * @return string
     */
    public function getDefaultBot()
    {
        return $this->app['config']['telegram.default'];
    }

    /**
     * Magically pass methods to the default bot.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->bot(), $method], $parameters);
    }
}
