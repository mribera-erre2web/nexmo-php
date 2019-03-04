<?php

namespace NexmoPhp\Client;

class Credentials
{

    protected $apiKey;
    protected $apiSecret;

    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function getApiKey(){
        return $this->apiKey;
    }

    public function getApiSecret(){
        return $this->apiSecret;
    }

}
