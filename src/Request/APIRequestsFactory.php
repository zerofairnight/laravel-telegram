<?php

namespace Laravel\Telegram\Request;

use Laravel\Telegram\Request\Factory\SendMessage;

trait APIRequestsFactory
{
    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * @return \Laravel\Telegram\Request\Factory\SendMessage
     */
    public function sendMessageQuery()
    {
        return new SendMessage($this);
    }

    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * @return \Laravel\Telegram\Request\ForwardMessage
     */
    public function forwardMessageRequest()
    {
        $sendMessage = new ForwardMessage();

        return $sendMessage;
    }
}
