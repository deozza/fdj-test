<?php

namespace App\Service\Euromillions\UseCase;

use App\Service\Euromillions\Model\Result;

interface UseCaseInterface {
    function getResult(): Result;
}