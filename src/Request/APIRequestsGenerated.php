<?php

namespace Laravel\Telegram\Request;

use Laravel\Telegram\Response\User;
use Laravel\Telegram\Response\Message;
use Laravel\Telegram\Response\Chat;
use Laravel\Telegram\Response\ChatMember;

trait APIRequests
{
    /**
     * A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
     *
     * @link https://core.telegram.org/bots/api#getme
     * @return \Laravel\Telegram\Response\User
     */
    public function getMe()
    {
        return $this->query(User::class);
    }

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
    public function sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'text', 'parse_mode', 'disable_web_page_preview', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to forward messages of any kind. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#forwardmessage
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|string    $from_chat_id, Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
     * @param int    $message_id, Message identifier in the chat specified in from_chat_id
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @return \Laravel\Telegram\Response\Message
     */
    public function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification = null)
    {
        return $this->query(Message::class, compact('chat_id', 'from_chat_id', 'message_id', 'disable_notification'));
    }

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#sendphoto
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile    $photo, Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. More info on Sending Files »
     * @param string|null    $caption, Photo caption (may also be used when resending photos by file_id), 0-1024 characters
     * @param string|null    $parse_mode, Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'photo', 'caption', 'parse_mode', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .mp3 format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     * Note: sendVoice.
     *
     * @link https://core.telegram.org/bots/api#sendaudio
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile    $audio, Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
     * @param string|null    $caption, Audio caption, 0-1024 characters
     * @param string|null    $parse_mode, Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     * @param int|null    $duration, Duration of the audio in seconds
     * @param string|null    $performer, Performer
     * @param string|null    $title, Track name
     * @param string|InputFile|null    $thumb, Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass "attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files »
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendAudio($chat_id, $audio, $caption = null, $parse_mode = null, $duration = null, $performer = null, $title = null, $thumb = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'audio', 'caption', 'parse_mode', 'duration', 'performer', 'title', 'thumb', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @link https://core.telegram.org/bots/api#senddocument
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile    $document, File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
     * @param string|InputFile|null    $thumb, Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass "attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files »
     * @param string|null    $caption, Document caption (may also be used when resending documents by file_id), 0-1024 characters
     * @param string|null    $parse_mode, Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendDocument($chat_id, $document, $thumb = null, $caption = null, $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'document', 'thumb', 'caption', 'parse_mode', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @link https://core.telegram.org/bots/api#sendvideo
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile    $video, Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. More info on Sending Files »
     * @param int|null    $duration, Duration of sent video in seconds
     * @param int|null    $width, Video width
     * @param int|null    $height, Video height
     * @param string|InputFile|null    $thumb, Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass "attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files »
     * @param string|null    $caption, Video caption (may also be used when resending videos by file_id), 0-1024 characters
     * @param string|null    $parse_mode, Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     * @param bool|null    $supports_streaming, Pass True, if the uploaded video is suitable for streaming
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendVideo($chat_id, $video, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = null, $supports_streaming = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'video', 'duration', 'width', 'height', 'thumb', 'caption', 'parse_mode', 'supports_streaming', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @link https://core.telegram.org/bots/api#sendanimation
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile    $animation, Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data. More info on Sending Files »
     * @param int|null    $duration, Duration of sent animation in seconds
     * @param int|null    $width, Animation width
     * @param int|null    $height, Animation height
     * @param string|InputFile|null    $thumb, Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass "attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files »
     * @param string|null    $caption, Animation caption (may also be used when resending animation by file_id), 0-1024 characters
     * @param string|null    $parse_mode, Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendAnimation($chat_id, $animation, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'animation', 'duration', 'width', 'height', 'thumb', 'caption', 'parse_mode', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .ogg file encoded with OPUS (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     *
     * @link https://core.telegram.org/bots/api#sendvoice
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile    $voice, Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
     * @param string|null    $caption, Voice message caption, 0-1024 characters
     * @param string|null    $parse_mode, Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     * @param int|null    $duration, Duration of the voice message in seconds
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendVoice($chat_id, $voice, $caption = null, $parse_mode = null, $duration = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'voice', 'caption', 'parse_mode', 'duration', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * As of v.4.0, Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#sendvideonote
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|InputFile    $video_note, Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More info on Sending Files ». Sending video notes by a URL is currently unsupported
     * @param int|null    $duration, Duration of sent video in seconds
     * @param int|null    $length, Video width and height, i.e. diameter of the video message
     * @param string|InputFile|null    $thumb, Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass "attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files »
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendVideoNote($chat_id, $video_note, $duration = null, $length = null, $thumb = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'video_note', 'duration', 'length', 'thumb', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send a group of photos or videos as an album. On success, an array of the sent Messages is returned.
     *
     * @link https://core.telegram.org/bots/api#sendmediagroup
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputMediaPhoto[]|InputMediaVideo[]    $media, A JSON-serialized array describing photos and videos to be sent, must include 2–10 items
     * @param bool|null    $disable_notification, Sends the messages silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the messages are a reply, ID of the original message
     * @return \Laravel\Telegram\Response\Message[]
     */
    public function sendMediaGroup($chat_id, $media, $disable_notification = null, $reply_to_message_id = null)
    {
        return $this->query(Message::class, compact('chat_id', 'media', 'disable_notification', 'reply_to_message_id'));
    }

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#sendlocation
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param float    $latitude, Latitude of the location
     * @param float    $longitude, Longitude of the location
     * @param int|null    $live_period, Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendLocation($chat_id, $latitude, $longitude, $live_period = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'latitude', 'longitude', 'live_period', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to edit live location messages sent by the bot or via the bot (for inline bots). A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned.
     *
     * @link https://core.telegram.org/bots/api#editmessagelivelocation
     * @param float    $latitude, Latitude of new location
     * @param float    $longitude, Longitude of new location
     * @param int|string|null    $chat_id, Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null    $message_id, Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|null    $inline_message_id, Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param \Laravel\Telegram\Response\InlineKeyboardMarkup|null    $reply_markup, A JSON-serialized object for a new inline keyboard.
     * @return \Laravel\Telegram\Response\Message
     */
    public function editMessageLiveLocation($latitude, $longitude, $chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('latitude', 'longitude', 'chat_id', 'message_id', 'inline_message_id', 'reply_markup'));
    }

    /**
     * Use this method to stop updating a live location message sent by the bot or via the bot (for inline bots) before live_period expires. On success, if the message was sent by the bot, the sent Message is returned, otherwise True is returned.
     *
     * @link https://core.telegram.org/bots/api#stopmessagelivelocation
     * @param int|string|null    $chat_id, Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null    $message_id, Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|null    $inline_message_id, Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param \Laravel\Telegram\Response\InlineKeyboardMarkup|null    $reply_markup, A JSON-serialized object for a new inline keyboard.
     * @return \Laravel\Telegram\Response\Message
     */
    public function stopMessageLiveLocation($chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'message_id', 'inline_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send information about a venue. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#sendvenue
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param float    $latitude, Latitude of the venue
     * @param float    $longitude, Longitude of the venue
     * @param string    $title, Name of the venue
     * @param string    $address, Address of the venue
     * @param string|null    $foursquare_id, Foursquare identifier of the venue
     * @param string|null    $foursquare_type, Foursquare type of the venue, if known. (For example, "arts_entertainment/default”, "arts_entertainment/aquarium” or "food/icecream”.)
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendVenue($chat_id, $latitude, $longitude, $title, $address, $foursquare_id = null, $foursquare_type = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'latitude', 'longitude', 'title', 'address', 'foursquare_id', 'foursquare_type', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method to send phone contacts. On success, the sent Message is returned.
     *
     * @link https://core.telegram.org/bots/api#sendcontact
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string    $phone_number, Contact's phone number
     * @param string    $first_name, Contact's first name
     * @param string|null    $last_name, Contact's last name
     * @param string|null    $vcard, Additional data about the contact in the form of a vCard, 0-2048 bytes
     * @param bool|null    $disable_notification, Sends the message silently. Users will receive a notification with no sound.
     * @param int|null    $reply_to_message_id, If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null    $reply_markup, Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove keyboard or to force a reply from the user.
     * @return \Laravel\Telegram\Response\Message
     */
    public function sendContact($chat_id, $phone_number, $first_name, $last_name = null, $vcard = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->query(Message::class, compact('chat_id', 'phone_number', 'first_name', 'last_name', 'vcard', 'disable_notification', 'reply_to_message_id', 'reply_markup'));
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
     * Note: noticeable.
     *
     * @link https://core.telegram.org/bots/api#sendchataction
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string    $action, Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_audio or upload_audio for audio files, upload_document for general files, find_location for location data, record_video_note or upload_video_note for video notes.
     * @return true
     */
    public function sendChatAction($chat_id, $action)
    {
        return $this->query(true, compact('chat_id', 'action'));
    }

    /**
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     *
     * @link https://core.telegram.org/bots/api#getuserprofilephotos
     * @param int    $user_id, Unique identifier of the target user
     * @param int|null    $offset, Sequential number of the first photo to be returned. By default, all photos are returned.
     * @param int|null    $limit, Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     * @return \Laravel\Telegram\Response\UserProfilePhotos
     */
    public function getUserProfilePhotos($user_id, $offset = null, $limit = null)
    {
        return $this->query(UserProfilePhotos::class, compact('user_id', 'offset', 'limit'));
    }

    /**
     * Use this method to get basic info about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
     *
     * @link https://core.telegram.org/bots/api#getfile
     * @param string    $file_id, File identifier to get info about
     * @return \Laravel\Telegram\Response\File
     */
    public function getFile($file_id)
    {
        return $this->query(File::class, compact('file_id'));
    }

    /**
     * Use this method to kick a user from a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the group on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     * Note: Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is off in the target group. Otherwise members may only be removed by the group&#39;s creator or by the member that added them.
     *
     * @link https://core.telegram.org/bots/api#kickchatmember
     * @param int|string    $chat_id, Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
     * @param int    $user_id, Unique identifier of the target user
     * @param \Carbon\Carbon|null    $until_date, Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever
     * @return true
     */
    public function kickChatMember($chat_id, $user_id, $until_date = null)
    {
        return $this->query(true, compact('chat_id', 'user_id', 'until_date'));
    }

    /**
     * Use this method to unban a previously kicked user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#unbanchatmember
     * @param int|string    $chat_id, Unique identifier for the target group or username of the target supergroup or channel (in the format @username)
     * @param int    $user_id, Unique identifier of the target user
     * @return true
     */
    public function unbanChatMember($chat_id, $user_id)
    {
        return $this->query(true, compact('chat_id', 'user_id'));
    }

    /**
     * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate admin rights. Pass True for all boolean parameters to lift restrictions from a user. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#restrictchatmember
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int    $user_id, Unique identifier of the target user
     * @param \Carbon\Carbon|null    $until_date, Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
     * @param bool|null    $can_send_messages, Pass True, if the user can send text messages, contacts, locations and venues
     * @param bool|null    $can_send_media_messages, Pass True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages
     * @param bool|null    $can_send_other_messages, Pass True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages
     * @param bool|null    $can_add_web_page_previews, Pass True, if the user may add web page previews to their messages, implies can_send_media_messages
     * @return true
     */
    public function restrictChatMember($chat_id, $user_id, $until_date = null, $can_send_messages = null, $can_send_media_messages = null, $can_send_other_messages = null, $can_add_web_page_previews = null)
    {
        return $this->query(true, compact('chat_id', 'user_id', 'until_date', 'can_send_messages', 'can_send_media_messages', 'can_send_other_messages', 'can_add_web_page_previews'));
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Pass False for all boolean parameters to demote a user. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#promotechatmember
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int    $user_id, Unique identifier of the target user
     * @param bool|null    $can_change_info, Pass True, if the administrator can change chat title, photo and other settings
     * @param bool|null    $can_post_messages, Pass True, if the administrator can create channel posts, channels only
     * @param bool|null    $can_edit_messages, Pass True, if the administrator can edit messages of other users and can pin messages, channels only
     * @param bool|null    $can_delete_messages, Pass True, if the administrator can delete messages of other users
     * @param bool|null    $can_invite_users, Pass True, if the administrator can invite new users to the chat
     * @param bool|null    $can_restrict_members, Pass True, if the administrator can restrict, ban or unban chat members
     * @param bool|null    $can_pin_messages, Pass True, if the administrator can pin messages, supergroups only
     * @param bool|null    $can_promote_members, Pass True, if the administrator can add new administrators with a subset of his own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by him)
     * @return true
     */
    public function promoteChatMember($chat_id, $user_id, $can_change_info = null, $can_post_messages = null, $can_edit_messages = null, $can_delete_messages = null, $can_invite_users = null, $can_restrict_members = null, $can_pin_messages = null, $can_promote_members = null)
    {
        return $this->query(true, compact('chat_id', 'user_id', 'can_change_info', 'can_post_messages', 'can_edit_messages', 'can_delete_messages', 'can_invite_users', 'can_restrict_members', 'can_pin_messages', 'can_promote_members'));
    }

    /**
     * Use this method to generate a new invite link for a chat; any previously generated link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns the new invite link as String on success.
     *
     * @link https://core.telegram.org/bots/api#exportchatinvitelink
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @return string
     */
    public function exportChatInviteLink($chat_id)
    {
        return $this->query(String::class, compact('chat_id'));
    }

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     * Note: Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is off in the target group.
     *
     * @link https://core.telegram.org/bots/api#setchatphoto
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile    $photo, New chat photo, uploaded using multipart/form-data
     * @return true
     */
    public function setChatPhoto($chat_id, $photo)
    {
        return $this->query(true, compact('chat_id', 'photo'));
    }

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     * Note: Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is off in the target group.
     *
     * @link https://core.telegram.org/bots/api#deletechatphoto
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @return true
     */
    public function deleteChatPhoto($chat_id)
    {
        return $this->query(true, compact('chat_id'));
    }

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     * Note: Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is off in the target group.
     *
     * @link https://core.telegram.org/bots/api#setchattitle
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string    $title, New chat title, 1-255 characters
     * @return true
     */
    public function setChatTitle($chat_id, $title)
    {
        return $this->query(true, compact('chat_id', 'title'));
    }

    /**
     * Use this method to change the description of a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#setchatdescription
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|null    $description, New chat description, 0-255 characters
     * @return true
     */
    public function setChatDescription($chat_id, $description = null)
    {
        return $this->query(true, compact('chat_id', 'description'));
    }

    /**
     * Use this method to pin a message in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the ‘can_pin_messages’ admin right in the supergroup or ‘can_edit_messages’ admin right in the channel. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#pinchatmessage
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int    $message_id, Identifier of a message to pin
     * @param bool|null    $disable_notification, Pass True, if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels.
     * @return true
     */
    public function pinChatMessage($chat_id, $message_id, $disable_notification = null)
    {
        return $this->query(true, compact('chat_id', 'message_id', 'disable_notification'));
    }

    /**
     * Use this method to unpin a message in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the ‘can_pin_messages’ admin right in the supergroup or ‘can_edit_messages’ admin right in the channel. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#unpinchatmessage
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @return true
     */
    public function unpinChatMessage($chat_id)
    {
        return $this->query(true, compact('chat_id'));
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#leavechat
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     * @return true
     */
    public function leaveChat($chat_id)
    {
        return $this->query(true, compact('chat_id'));
    }

    /**
     * Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.). Returns a Chat object on success.
     *
     * @link https://core.telegram.org/bots/api#getchat
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     * @return \Laravel\Telegram\Response\Chat
     */
    public function getChat($chat_id)
    {
        return $this->query(Chat::class, compact('chat_id'));
    }

    /**
     * Use this method to get a list of administrators in a chat. On success, returns an Array of ChatMember objects that contains information about all chat administrators except other bots. If the chat is a group or a supergroup and no administrators were appointed, only the creator will be returned.
     *
     * @link https://core.telegram.org/bots/api#getchatadministrators
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     * @return \Laravel\Telegram\Response\ChatMember[]
     */
    public function getChatAdministrators($chat_id)
    {
        return $this->query(ChatMember::class, compact('chat_id'));
    }

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     *
     * @link https://core.telegram.org/bots/api#getchatmemberscount
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     * @return int
     */
    public function getChatMembersCount($chat_id)
    {
        return $this->query(Integer::class, compact('chat_id'));
    }

    /**
     * Use this method to get information about a member of a chat. Returns a ChatMember object on success.
     *
     * @link https://core.telegram.org/bots/api#getchatmember
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     * @param int    $user_id, Unique identifier of the target user
     * @return \Laravel\Telegram\Response\ChatMember
     */
    public function getChatMember($chat_id, $user_id)
    {
        return $this->query(ChatMember::class, compact('chat_id', 'user_id'));
    }

    /**
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#setchatstickerset
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string    $sticker_set_name, Name of the sticker set to be set as the group sticker set
     * @return true
     */
    public function setChatStickerSet($chat_id, $sticker_set_name)
    {
        return $this->query(true, compact('chat_id', 'sticker_set_name'));
    }

    /**
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     *
     * @link https://core.telegram.org/bots/api#deletechatstickerset
     * @param int|string    $chat_id, Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @return true
     */
    public function deleteChatStickerSet($chat_id)
    {
        return $this->query(true, compact('chat_id'));
    }

    /**
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
     * Note: Alternatively, the user can be redirected to the specified Game URL. For this option to work, you must first create a game for your bot via @Botfather and accept the terms. Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
     *
     * @link https://core.telegram.org/bots/api#answercallbackquery
     * @param string    $callback_query_id, Unique identifier for the query to be answered
     * @param string|null    $text, Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
     * @param bool|null    $show_alert, If true, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
     * @param string|null    $url, URL that will be opened by the user's client. If you have created a Game and accepted the conditions via @Botfather, specify the URL that opens your game – note that this will only work if the query comes from a callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
     * @param int|null    $cache_time, The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
     * @return true
     */
    public function answerCallbackQuery($callback_query_id, $text = null, $show_alert = null, $url = null, $cache_time = null)
    {
        return $this->query(true, compact('callback_query_id', 'text', 'show_alert', 'url', 'cache_time'));
    }

    public function editMessageText()
    {
        // TODO
    }
    public function editMessageCaption()
    {
        // TODO
    }
    public function editMessageMedia()
    {
        // TODO
    }
    public function editMessageReplyMarkup()
    {
        // TODO
    }
    public function deleteMessage()
    {
        // TODO
    }
    public function sendSticker()
    {
        // TODO
    }

    // https://core.telegram.org/bots/api#getting-updates

    /**
     * Use this method to receive incoming updates using long polling (wiki). An Array of Update objects is returned.
     *
     * @link https://core.telegram.org/bots/api#getupdates
     * @param int|null    $offset,  	Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All previous updates will forgotten.
     * @param int|null    $limit,  	Limits the number of updates to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     * @param int|null    $timeout,  	Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling should be used for testing purposes only.
     * @param string[]|null    $allowed_updates,  	List the types of updates you want your bot to receive. For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all updates regardless of type (default). If not specified, the previous setting will be used. Please note that this parameter doesn't affect updates created before the call to the getUpdates, so unwanted updates may be received for a short period of time.
     * @return Update[]
     */
    public function __getUpdates($offset = null, $limit = null, $timeout = null, $allowed_updates = null)
    {
        return $this->query(true, compact('offset', 'limit', 'timeout', 'allowed_updates'));
    }

    protected function query($class_name, $params = [])
    {
        [$query, $caller] = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

        return $this->send($caller['function'], array_filter($params), [
            'async' => false,
            'cast_to' => $class_name,
        ]);
    }
}
