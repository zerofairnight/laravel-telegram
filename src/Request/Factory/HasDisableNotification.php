<?php

namespace Laravel\Telegram\Request\Factory;

trait HasDisableNotification
{
    /**
     * Sends the message silently. Users will receive a notification with no sound.
     *
     * @return $this
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
     * @return $this
     */
    public function silent()
    {
        return $this->disableNotification();
    }
}
