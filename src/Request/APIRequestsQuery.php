<?php

namespace Laravel\Telegram\Request;

use Laravel\Telegram\Response\User;
use Laravel\Telegram\Response\Message;
use Laravel\Telegram\Response\Chat;
use Laravel\Telegram\Response\ChatMember;

trait APIRequestsQuery
{
    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#sendmessage
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string    $text, Text of the message to be sent
     * @param string|null    $parse_mode, Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     * @param bool|null    $disable_web_page_preview, Disables link previews for links in this message
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendMessageQuery()
    {
        return $this->query(Message::class, compact('chat_id', 'text', 'parse_mode', 'disable_web_page_preview', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }
}
