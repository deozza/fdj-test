<?php

namespace App\Service\Euromillions\Adapter;

use App\Service\Utils\Guzzle\GuzzleClient;
use App\Service\Euromillions\Model\Result;

class GuzzleAdapter extends GuzzleClient implements AdapterInterface  {
    public function queryResult(): Result {
        $endpoint = 'service-draws/v1/games/euromillions/draws';
        $parameters = [
            'include' => 'results,addons',
            'range' => '0-0'
        ];

        $response = $this->client->request('GET', $endpoint, [
            'query' => $parameters
        ]);

        $responseBody = json_decode($response->getBody(), $assoc = true)[0];

        $result = new Result();
        $result->setDate($responseBody['drawn_at']);
        $result->setMyMillionId($responseBody['addons'][0]['value']);
        foreach($responseBody['results'] as $number) {
            $result->addNumber($number['type'], $number['value']);
        }

        return $result;
        
    }
}