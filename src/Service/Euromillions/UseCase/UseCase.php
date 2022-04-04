<?php

namespace App\Service\Euromillions\UseCase;

use App\Service\Euromillions\Model\Result;

class UseCase implements UseCaseInterface{

    public function getResult(): Result {
        $result = new Result();

        return $result;
    }
    
}