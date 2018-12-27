<?php

namespace Laravel\Telegram\Http\Controllers;

use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends Controller
{
    /**
     * Handle a Telegram webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $token
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getWebhookUpdates(Request $request, $token)
    {
        $payload = json_decode($request->getContent(), true);
    }
}
