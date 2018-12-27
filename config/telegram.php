<?php

return [

    'default' => 'default',

    'bots' => [
        'default' => [
            'token'  => env('TELEGRAM_BOT_TOKEN'),
            'username'  => env('TELEGRAM_BOT_NAME'),
        ]
    ],

];
