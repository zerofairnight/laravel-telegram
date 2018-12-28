<?php

namespace Laravel\Telegram\Request\Factory;

class SendMessage extends RequestFactory
{
    use HasChatId, HasDisableNotification, HasReplyToMessage, HasReplyMarkup;

    /**
     * Set the text.
     *
     * @param  string  $text
     * @return $this
     */
    public function text($text)
    {
        $this->params['text'] = $text;

        return $this;
    }

    /**
     * Set the mode to HTML, optionally set the text.
     *
     * @param  string|null  $text
     * @return $this
     */
    public function html($text = null)
    {
        $this->params['parse_mode'] = 'html';

        if (! is_null($text)) {
            $this->params['text'] = $text;
        }

        return $this;
    }

    /**
     * Set the mode to Markdown, optionally set the text.
     *
     * @param  string|null  $text
     * @return $this
     */
    public function markdown($text = null)
    {
        $this->params['parse_mode'] = 'markdown';

        if (! is_null($text)) {
            $this->params['text'] = $text;
        }

        return $this;
    }

    /**
     * Disables link previews for links in this message.
     * For example, this will prevent a youtube link to display its thumbnail.
     *
     * @return $this
     */
    public function disablePreview()
    {
        $this->params['disable_web_page_preview'] = true;

        return $this;
    }
}
