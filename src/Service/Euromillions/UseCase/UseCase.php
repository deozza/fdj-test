<?php

namespace App\Service\Euromillions\UseCase;

use App\Service\Euromillions\Model\Result;
use App\Service\Euromillions\Service\Service;

class UseCase implements UseCaseInterface{
    private Service $service;

    public function __construct()
    {        
        $this->service = new Service();
    }

    public function getResult(): Result {
        $result = $this->service->queryResult();

        return $result;
    }
    
}