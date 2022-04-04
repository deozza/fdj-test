<?php

namespace App\Tests\Service\Euromillions\UseCase;

use App\Service\Euromillions\Service\Service;
use App\Service\Euromillions\UseCase\UseCase;
use App\Service\Euromillions\Model\Result;

use PHPUnit\Framework\TestCase;


class UseCaseTest extends TestCase
{
    public function test_getResult_checkResultIsReturned() {
        $mockedReturn = new Result();
        $mockedReturn->setDate('2022-04-01T21:45:00+02:00');
        $mockedReturn->setMyMillionId("myMillionId");
        $mockedReturn->addNumber('number', '01');

        $mockedService = $this->createMock(Service::class);
        $mockedService->expects($this->once())
            ->method('queryResult')
            ->willReturn($mockedReturn);
        
        $useCase = new UseCase();

        $reflection = new \ReflectionClass($useCase);
        $reflection_property = $reflection->getProperty('service');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($useCase, $mockedService);

        $result = $useCase->getResult();

        $this->assertEquals($mockedReturn, $result);
    }
}