<?php

namespace Laravel\Telegram\Request\Factory;

class ForwardMessage extends RequetsFactory
{
    /**
     * Set the chat id to which send the message.
     *
     * @param  int|string  $chat_id
     * @return \Laravel\Telegram\Request\SendMessage
     */
    public function chat($chat_id)
    {
        $this->params['chat_id'] = $chat_id;

        return $this;
    }

    /**
     * Username of the target channel (in the format @channelusername)
     * Alias for chat()
     *
     * @param  string  $username
     * @return \Laravel\Telegram\Request\SendMessage
     */
    public function username($username)
    {
        $this->params['chat_id'] = $username;

        return $this;
    }

    /**
     * Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
     *
     * @param  int|string  $from_chat_id
     * @return \Laravel\Telegram\Request\SendMessage
     */
    public function from($from_chat_id)
    {
        $this->params['from_chat_id'] = $from_chat_id;

        return $this;
    }

    /**
     * Message identifier in the chat specified in from_chat_id
     *
     * @param  int|string  $message_id
     * @return \Laravel\Telegram\Request\SendMessage
     */
    public function message($message_id)
    {
        $this->params['message_id'] = $message_id;

        return $this;
    }

    /**
     * Sends the message silently. Users will receive a notification with no sound.
     *
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function disableNotification()
    {
        $this->params['disable_notification'] = true;

        return $this;
    }

    /**
     * Sends the message silently. Users will receive a notification with no sound.
     * Alias to disableNotification()
     *
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function silent()
    {
        return $this->disableNotification();
    }
}
