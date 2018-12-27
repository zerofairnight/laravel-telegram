<?php

namespace Laravel\Telegram\Response;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
 *
 * @link https://core.telegram.org/bots/api#file
 */
class File extends TelegramObject
{
    /**
     * Unique identifier for this file.
     *
     * @var string
     */
    public $file_id;

    /**
     * Optional. File size, if known.
     *
     * @var int|null
     */
    public $file_size;

    /**
     * Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
     *
     * @var string|null
     */
    public $file_path;
}
