<?php

namespace App\Service\Euromillions\Service;

use App\Service\Euromillions\Adapter\GuzzleAdapter;
use App\Service\Euromillions\Adapter\AdapterInterface;
use App\Service\Euromillions\Model\Result;

class Service implements ServiceInterface{
    
    private AdapterInterface $adapter;

    public function __construct()
    {
        $this->adapter = new GuzzleAdapter();
    }

    public function queryResult(): Result
    {
        $result = $this->adapter->queryResult();

        return $result;
    }
}