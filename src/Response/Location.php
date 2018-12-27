<?php

namespace Laravel\Telegram\Response;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 *
 * @link https://core.telegram.org/bots/api#location
 */
class Location extends TelegramObject
{
    /**
     * Longitude as defined by sender.
     *
     * @var float
     */
    public $longitude;

    /**
     * Latitude as defined by sender.
     *
     * @var float
     */
    public $latitude;
}
