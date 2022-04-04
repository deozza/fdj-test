<?php

namespace App\Tests\Service\Euromillions\UseCase;

use App\Service\Euromillions\Model\Result;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Service\Euromillions\UseCase\UseCase;

class UseCaseTest extends KernelTestCase
{
    public function testGetResult_checkReturnType()
    {
        $useCase = new UseCase();

        $result = $useCase->getResult();

        $expectedResultType = Result::class;

        $this->assertInstanceOf($expectedResultType, $result);
    }
}