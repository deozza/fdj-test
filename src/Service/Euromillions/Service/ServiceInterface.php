<?php

namespace App\Service\Euromillions\Service;

use App\Service\Euromillions\Model\Result;

interface ServiceInterface {
    function queryResult(): Result;
}