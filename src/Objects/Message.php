<?php

namespace Laravel\Telegram\Objects;

/**
 * This object represents a message.
 *
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends TelegramObject
{
    /**
     * Unique message identifier inside this chat.
     *
     * @var int
     */
    public $message_id;

    /**
     * Optional. Sender, empty for messages sent to channels.
     *
     * @var User
     */
    public $from;

    /**
     * Date the message was sent in Unix time.
     *
     * @var Carbon
     */
    public $date;

    /**
     * Conversation the message belongs to.
     *
     * @var Chat
     */
    public $chat;

    /**
     * Optional. For forwarded messages, sender of the original message.
     *
     * @var User
     */
    public $forward_from;

    public function from()
    {
        return new User($this->from);
    }
}
