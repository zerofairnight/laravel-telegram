<?php

if (! function_exists('telegram')) {
    /**
     * Get a telegram bot from username or token (optional).
     *
     * @param  string  $bot
     * @return \Laravel\Telegram\TelegramManager|\Laravel\Telegram\TelegramBot
     */
    function telegram($bot = null)
    {
        return $bot ? app('telegram')->bot($bot) : app('telegram');
    }
}
