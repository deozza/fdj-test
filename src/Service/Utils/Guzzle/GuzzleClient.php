<?php

namespace App\Service\Utils\Guzzle;

use GuzzleHttp\Client;

class GuzzleClient {
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.fdj.fr/api/',
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);
    }
}
