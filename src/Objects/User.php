<?php

namespace Laravel\Telegram\Objects;

/**
 * This object represents a Telegram user or bot.
 *
 * @see https://core.telegram.org/bots/api#user
 */
class User extends TelegramObject
{
    /**
     * Unique identifier for this user or bot.
     *
     * @var int
     */
    public $id;

    /**
     * True, if this user is a bot.
     *
     * @var bool
     */
    public $is_bot;

    /**
     * User‘s or bot’s first name.
     *
     * @var string
     */
    public $first_name;

    /**
     * Optional. User‘s or bot’s last name.
     *
     * @var string|null
     */
    public $last_name;

    /**
     * Optional. User‘s or bot’s username.
     *
     * @var string|null
     */
    public $username;

    /**
     * Optional. IETF language tag of the user's language.
     *
     * @var string|null
     */
    public $language_code;
}
