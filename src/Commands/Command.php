<?php

namespace Laravel\Telegram\Commands;

/**
 * A Telegram command.
 */
abstract class Command
{
    /**
     * The telegram bot instance associated to this command.
     *
     * @var \Laravel\Telegram\TelegramBot
     */
    protected $bot;

    /**
     * The name and signature of the telegram command.
     *
     * @var string
     */
    protected $signature;

    /**
     * The telegram command name.
     *
     * @var string
     */
    protected $name;

    /**
     * The telegram command description.
     *
     * @var string
     */
    protected $description;
}
