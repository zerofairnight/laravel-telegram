<?php

namespace Laravel\Telegram\Request\Factory;

trait HasParseMode
{
    /**
     * Set the mode to HTML.
     *
     * @return \Laravel\Telegram\Request\SendMessage
     */
    public function html()
    {
        $this->params['parse_mode'] = 'html';

        return $this;
    }

    /**
     * Set the mode to HTML.
     *
     * @return \Laravel\Telegram\Request\SendMessage
     */
    public function markdown()
    {
        $this->params['parse_mode'] = 'markdown';

        return $this;
    }
}
