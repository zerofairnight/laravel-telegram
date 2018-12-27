<?php

namespace Laravel\Telegram\Response;

/**
 * This object represents a message.
 *
 * @link https://core.telegram.org/bots/api#message
 */
class Message extends Response
{
    /**
     * {@inheritdoc}
     *
     */
    protected $relations = [
        'from' => User::class,
    ];

    public function isPrivateChat()
    {
        return $this->attributes['chat']['type'] === 'private';
    }

    public function commands()
    {
        if (! isset($this->attributes['entities'])) {
            return [];
        }

        $text = $this->attributes['text'];
        $commands = [];
        foreach ($this->attributes['entities'] as $entity) {
            $commands[] = substr($text, $entity['offset'], $entity['length']);
        }
        return $commands;
    }

    public function hasBotCommand()
    {
        if (isset($this->attributes['entities'])) {

        }

        $entities = $this->attributes['entities'];

        // MessageEntity

        foreach ($entities as $entity) {
            if ($entity->type === 'bot_command') {
                return true;
            }
        }
    }
}
