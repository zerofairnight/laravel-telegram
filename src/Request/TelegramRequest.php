<?php

namespace Laravel\Telegram\Request;

/**
 * The base class for all temegram requests.
 */
class TelegramRequest
{
    use APIRequests, APIRequestsAsync, APIRequestsFactory;

    /**
     * The telegram base url for API requests.
     *
     * @var string
     */
    const URL = 'https://api.telegram.org/bot';

    /**
     * The telegram bot id.
     *
     * @var string
     */
    protected $id;

    /**
     * The telegram API token.
     *
     * @var string
     */
    protected $token;

    /**
     * The telegram bot username.
     *
     * @var string
     */
    protected $username;

    /**
     * Indicates if the request is asynchronous (non-blocking).
     *
     * @var bool
     */
    protected $async = false;

    /**
     * Creates a new Telegram API Request.
     *
     * @param string $token The token used for the request
     * @param string $username The bot username
     * @param bool $async The bot username
     */
    public function __construct($token, $username = null, $async = false)
    {
        // the first part of the telegram token is the bot id separated by a colon.
        // $token = {id}:{key}
        $this->id = explode(':', $token)[0];
        $this->token = $token;
        $this->username = $username;
        $this->async = $async;
    }

    /**
     * Set the request to be asynchronous.
     *
     * @return Laravel\Telegram\Request\TelegramRequest
     */
    public function async()
    {
        $this->async = true;

        return $this;
    }

    /**
     * Get the full url of the  endpoint for the method.
     *
     * @return string
     */
    public function getEndpoint($method)
    {
        return self::URL . "{$this->token}/{$method}";
    }

    /**
     * Send the request.
     *
     * @throws \InvalidArgumentException if the token is missing.
     *
     * @return mixed Returns the response data.
     */
    public function send($method, array $params = [], array $options = [])
    {
        if (is_null($this->token)) {
            throw new \InvalidArgumentException("Attemp to send the request \"{$method}\" whitout a token.");
        }

        $url = $this->getEndpoint($method);

        $client = new \GuzzleHttp\Client();
        $timeOut = 30;
        $connectTimeOut = 15;

        $options = [
            \GuzzleHttp\RequestOptions::TIMEOUT => $timeOut,
            \GuzzleHttp\RequestOptions::CONNECT_TIMEOUT => $connectTimeOut,
            \GuzzleHttp\RequestOptions::SYNCHRONOUS => $this->async,
            \GuzzleHttp\RequestOptions::HTTP_ERRORS => false, // we handle errors by ourself!
            // \GuzzleHttp\RequestOptions::MULTIPART
            // \GuzzleHttp\RequestOptions::FORM_PARAMS => $params,
        ];

        if ($this->isMultipartPayload($params)) {
            $options[\GuzzleHttp\RequestOptions::MULTIPART] = $this->createMultipartPayload($params);
        } else {
            $options[\GuzzleHttp\RequestOptions::FORM_PARAMS] = $params;
        }


        $response = $client->post($url, $options);

        // $status_code = $response->getStatusCode();

        $contents = json_decode($response->getBody(), true);

        if (! isset($contents['ok'])) {
            // throw
            dd($contents);
        }

        if ($contents['ok'] === false) {
            // {"ok":false,"error_code":400,"description":"Bad Request: not enough rights to change chat title"}"
            dd($contents);
        }

        if ($contents['ok'] === true) {
            dd($contents['result']);
            // {"ok":false,"result":"Bad Request: not enough rights to change chat title"}"
            // $contents['result']
        }

        return $this->parseResponse($contents['result']);

        // for a list of errors see here: https://core.telegram.org/api/errors
        // $res->getStatusCode();

        $url = $this->getEndpoint($method);

        if ($this->async) {
            $client->postAsync($url, [\GuzzleHttp\RequestOptions::JSON => $params]);
        } else {
            $response = $client->post($url, [\GuzzleHttp\RequestOptions::JSON => $params]);

            $data = json_decode($response->getBody(), true);

            if ($data['ok'] === false) {

            }

            // $data['result']

            return $this->parseResponse($data['result']);
        }
    }

    protected function prepareRequest($params = [])
    {
        //
    }

    protected function isMultipartPayload($params)
    {
        return count(array_filter($params, function ($param) {
            if ($param instanceof \Laravel\Telegram\Objects\InputFile) {
                return $param->isStream();
            }

            return is_resource($param) || $param instanceof \GuzzleHttp\Psr7\Stream;
        }));
    }

    protected function createMultipartPayload($params)
    {
        return array_map(function ($name, $contents) {
            if ($contents instanceof \Laravel\Telegram\Objects\InputFile) {
                return [
                    'name' => $name,
                    'contents' => $contents->open()
                ];
            }

            return compact('name', 'contents');
        }, array_keys($params), $params);
    }

    protected function parseResponse($data)
    {
        // special value
        if (is_bool($data) || is_numeric($data) || is_string($data)) {
            return $data;
        }


        // @HACK: here we do something really BAD


        // we have an array of objects
        if (is_array($data) && key($data) === 0) {
            return array_map(function ($data) {
                return $this->parseResponse($data);
            }, $data);
        }

        // return new $class_name($response);


        // Update // update_id
        if (isset($data['update_id'])) {
            if (isset($data['message'])) {
                return new \Laravel\Telegram\Response\UpdateMessage($data);
            }

            throw \Exception('asd');
        }

        // Message // message_id
        if (isset($data['message_id'])) {
            return new \Laravel\Telegram\Response\Message($data);
        }

        // User // id - is_bot - first_name
        if (isset($data['is_bot']) && isset($data['id'])) {
            return new \Laravel\Telegram\Response\User($data);
        }

        // Chat // id - type
        if (isset($data['type']) && isset($data['id'])) {
            return new \Laravel\Telegram\Response\Chat($data);
        }

        // ChatMember // user - status
        if (isset($data['user']) && isset($data['status'])) {
            return new \Laravel\Telegram\Response\ChatMember($data);
        }

        // UserProfilePhotos // total_count - photos
        if (isset($data['total_count']) && isset($data['photos'])) {
            return new \Laravel\Telegram\Response\UserProfilePhotos($data);
        }

        // File // file_id
        if (isset($data['file_id'])) {
            return new \Laravel\Telegram\Response\File($data);
        }

        return $data;
    }
}
