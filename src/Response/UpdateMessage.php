<?php

namespace Laravel\Telegram\Response;

/**
 * This object represents a new incoming message of any kind — text, photo, sticker, etc.
 *
 * @link https://core.telegram.org/bots/api#update
 */
class UpdateMessage extends Update
{
    /**
     * New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var \Laravel\Telegram\Response\Message
     */
    protected $message;
}
