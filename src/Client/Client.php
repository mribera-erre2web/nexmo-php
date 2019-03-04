<?php

namespace NexmoPhp\Client;

class Client
{
    const VERSION = '1.2.0';

    const BASE_API  = 'https://api.nexmo.com';

    /**
     * API Credentials
     * @var Credentials
     */
    protected $credentials;

    protected $curl;

    public function __construct(Credentials $credentials)
    {
        //make sure we know how to use the credentials
        if(!($credentials instanceof Credentials)) {
            throw new \RuntimeException('unknown credentials type: ' . get_class($credentials));
        }

        $this->curl = curl_init();

        $this->credentials = $credentials;

        curl_setopt($this->curl, CURLOPT_POST, 1);

        // Optional Authentication:
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));

        curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->curl, CURLOPT_USERPWD, $credentials->getApiKey().":".$credentials->getApiSecret());
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

        // Set the default URLs. Keep the constants for
        // backwards compatibility
        $this->apiUrl = static::BASE_API;
    }

    /**
     * Return the apiUrl
     * @return String Api Url
     */
    public function getApiUrl(){
        return $this->apiUrl;
    }

    /**
     * Set Messages endpoint
     * @param Messages Template of the message
     * @return message_uuid or error
     */
    public function messages(Messages $messages){
        curl_setopt($this->curl, CURLOPT_URL, $this->getApiUrl()."/v0.1/messages");
        return $this->send($messages);
    }

    /**
     * Set Dispatch endpoint
     * @param Dispatch Template of the message
     * @return message_uuid or error
     */
    public function dispatch(Dispatch $dispatch){
        curl_setopt($this->curl, CURLOPT_URL, $this->getApiUrl()."/v0.1/dispatch");
        return $this->send($dispatch);
    }

    /**
     * Send message with data not encoded in json
     * @param $data Messages or Dispatch messages
     * @return String Result of request
     */
    public function send($data){
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));

        $result = curl_exec($this->curl);

        curl_close($this->curl);

        return $result;
    }

}
