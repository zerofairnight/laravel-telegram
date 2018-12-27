<?php

namespace Laravel\Telegram\Response;

/**
 * The base response for telegram.
 *
 * @link https://core.telegram.org/bots/api#available-types
 */
abstract class Response
{
    /**
     * The loaded relationships for the request.
     *
     * @var array
     */
    protected $relations = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
        'edit_date',
        'file_date',
    ];

    /**
     * Create a new Telegram Response from a payload array.
     *
     * @param  array  $payload
     * @return void
     */
    public function __construct(array $payload = [])
    {
        foreach ($payload as $name => $value) {
            if (isset($this->relations[$name])) {
                $this->$name = new $this->relations[$name]($value);
            } else {
                $this->$name = $value;
            }
        }
    }

    public function __get(string $name)
    {
        // if (isset($this->relations[$name])) {
        //     return new $this->relations[$name]($this->$name);
        // }

        return $this->$name;
    }
}
