<?php

namespace Laravel\Telegram\Request\Factory;

trait HasReplyToMessage
{
    /**
     * If the message is a reply, ID of the original message.
     *
     * @param  int  $message_id
     * @return $this
     */
    public function reply($message_id)
    {
        $this->params['reply_to_message_id'] = $message_id;

        return $this;
    }
}
