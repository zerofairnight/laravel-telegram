<?php

namespace Laravel\Telegram\Objects;

/**
 * The base object for telegram.
 */
abstract class TelegramObject
{
    /**
     * The object payload.
     *
     * @var array
     */
    protected $payload = [];

    /**
     * Create a new Telegram Object from a payload array.
     *
     * @param  array  $payload
     * @return void
     */
    public function __construct(array $payload = [])
    {
        $this->payload = $payload;

        foreach ($payload as $key => $value) {
            // if (! property_exists($this, $key)) {
            //     return;
            // }

            $this->$key = $value;
        }
    }

    /**
     * Get a property from the payload.
     * Use the dot '.' to access nested properties
     * Note: Alias for array_get
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_get($this->payload, $key, $default);
    }

    /**
     * Get the object payload.
     *
     * @return array
     */
    public function getPayload()
    {
        return $this->payload;
    }
}
