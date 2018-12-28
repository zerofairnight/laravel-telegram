<?php

namespace Laravel\Telegram\Objects;

class InputFile
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function isStream()
    {
        return is_resource($this->file) || $this->file instanceof \GuzzleHttp\Psr7\Stream;
    }

    public function open()
    {
        return $this->file;
    }

    public function __toString()
    {
        return $this->file;
    }
}
