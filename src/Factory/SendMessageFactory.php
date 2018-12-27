<?php

namespace Laravel\Telegram\Factory;

class SendMessageFactory
{
    /**
     * The factory params.
     *
     * @var array
     */
    protected $params = [];

    /**
     * Set the chat id to which send the message.
     *
     * @param  int|string  $chat_id
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function chat($chat_id)
    {
        $this->params['chat_id'] = $chat_id;

        return $this;
    }

    /**
     * Username of the target channel (in the format @channelusername)
     *
     * @param  string  $username
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function username($username)
    {
        $this->params['chat_id'] = $username;

        return $this;
    }

    /**
     * Set the text.
     *
     * @param  string  $text
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function text($text)
    {
        $this->params['text'] = $text;

        return $this;
    }

    /**
     * Set the mode to HTML.
     *
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function html()
    {
        $this->params['parse_mode'] = 'html';

        return $this;
    }

    /**
     * Set the mode to HTML.
     *
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function markdown()
    {
        $this->params['parse_mode'] = 'markdown';

        return $this;
    }


    /**
     * Disables link previews for links in this message
     *
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function disablePreview()
    {
        $this->params['disable_web_page_preview'] = true;

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

    /**
     * If the message is a reply, ID of the original message.
     *
     * @param  int  $message_id
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function reply($message_id)
    {
        $this->params['reply_to_message_id'] = $message_id;

        return $this;
    }

    /**
     * Inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     *
     * @return \Laravel\Telegram\Factory\SendMessageFactory
     */
    public function replyMarkup($reply_markup)
    {
        $this->params['reply_markup'] = $reply_markup;

        return $this;
    }
}
