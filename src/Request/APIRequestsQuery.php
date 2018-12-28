<?php

namespace Laravel\Telegram\Request;

use Laravel\Telegram\Response\User;
use Laravel\Telegram\Response\Message;
use Laravel\Telegram\Response\Chat;
use Laravel\Telegram\Response\ChatMember;

trait APIRequestsQuery
{
    public function sendMessageQuery()
    {
        return new SendMessage($this);
    }
}
