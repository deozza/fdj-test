<?php

namespace App\Tests\Service\Euromillions\Service;

use App\Service\Euromillions\Adapter\GuzzleAdapter;
use App\Service\Euromillions\Service\Service;
use App\Service\Euromillions\Model\Result;

use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    public function test_queryResult_checkResultIsReturned() {

        $mockedReturn = new Result();
        $mockedReturn->setDate('2022-04-01T21:45:00+02:00');
        $mockedReturn->setMyMillionId("myMillionId");
        $mockedReturn->addNumber('number', '01');

        $mockedAdapter = $this->createMock(GuzzleAdapter::class);
        $mockedAdapter->expects($this->once())
            ->method('queryResult')
            ->willReturn($mockedReturn);
        
        $service = new Service();

        $reflection = new \ReflectionClass($service);
        $reflection_property = $reflection->getProperty('adapter');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($service, $mockedAdapter);

        $result = $service->queryResult();

        $this->assertEquals($mockedReturn, $result);
    }
}