<?php

namespace Laravel\Telegram\Response;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 *
 * @link https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends TelegramObject
{
    /**
     * Unique identifier for this query.
     *
     * @var string
     */
    public $id;

    /**
     * Sender.
     *
     * @var User
     */
    public $from;

    /**
     * Optional. Sender location, only for bots that request user location.
     *
     * @var Location
     */
    public $location;

    /**
     * Text of the query (up to 512 characters).
     *
     * @var string
     */
    public $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot.
     *
     * @var string
     */
    public $offset;
}
