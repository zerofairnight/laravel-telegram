<?php

namespace Laravel\Telegram;

use Laravel\Telegram\Request\TelegramRequest;

/**
 * A telegram bot.
 */
class TelegramBot extends TelegramRequest
{
    /**
     * Create a new instace of the bot.
     */
    public function __construct($token, $username)
    {
        parent::__construct($token, $username);
    }

    /**
     * @link https://core.telegram.org/bots/api#getupdates
     */
    public function getUpdates()
    {
        $result = $this->send('getUpdates', ['offset' => -1]);
        //$this->send('getUpdates', ['offset' => collect($result)->pluck('update_id')->max() + 1]);

        dd($result);

        foreach ($result as $update) {
            // dd($update->update_id);
            dd($update->message->commands());
        }


        foreach ($result as $update) {
            $update_id = $update['update_id'];

            // unset the update_id so we can parse all other data
            unset($update['update_id']);

            foreach ($update as $key => $payload) {
                $method = 'handle'.studly_case(str_replace('.', '_', $key));
                if (method_exists($this, $method)) {
                    return $this->{$method}($payload);
                }
            }
        }
    }

    public function handleMessage($payload)
    {
        $message = new \Laravel\Telegram\Response\Message($payload);
        dd($message);


        $message = new \Laravel\Telegram\Objects\Message($payload);
    }
}
