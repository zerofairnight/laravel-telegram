<?php

namespace Laravel\Telegram\Request\Factory;

trait HasReplyMarkup
{
    /**
     * Inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     *
     * @return \Laravel\Telegram\Request\SendMessage
     */
    public function replyMarkup($reply_markup)
    {
        $this->params['reply_markup'] = $reply_markup;

        return $this;
    }
}
