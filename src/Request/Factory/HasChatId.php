<?php

namespace Laravel\Telegram\Request\Factory;

trait HasChatId
{
    /**
     * Set the chat id to which send the message.
     *
     * @param  int|string  $chat_id
     * @return $this
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
     * @return $this
     */
    public function channel($username)
    {
        $this->params['chat_id'] = $username;

        return $this;
    }
}
