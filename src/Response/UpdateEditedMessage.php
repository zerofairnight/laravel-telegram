<?php

namespace Laravel\Telegram\Response;

/**
 * This object represents a new version of a message that is known to the bot and was edited.
 *
 * @link https://core.telegram.org/bots/api#update
 */
class UpdateEditedMessage extends Update
{
    /**
     * New version of a message that is known to the bot and was edited.
     *
     * @var \Laravel\Telegram\Response\Message
     */
    protected $edited_message;
}
