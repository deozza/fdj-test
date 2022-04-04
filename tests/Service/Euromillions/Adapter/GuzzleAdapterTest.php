<?php

namespace App\Tests\Service\Euromillions\Adapter;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;
use App\Service\Euromillions\Adapter\GuzzleAdapter;
use App\Service\Euromillions\Model\Result;

class GuzzleAdapterTest extends TestCase
{
    public function test_queryResult_checkBadRequestTriggerException() {
        $mockedResponse = new MockHandler([
            new Response(400, ['Content-Type' => 'application/json']),
        ]);
        $handlerStack = HandlerStack::create($mockedResponse);
        $mockedGuzzleClient = new Client(['handler' => $handlerStack]);

        $guzzleAdapter = new GuzzleAdapter();

        $reflection = new \ReflectionClass($guzzleAdapter);
        $reflection_property = $reflection->getProperty('client');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($guzzleAdapter, $mockedGuzzleClient);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("400 Bad Request");

        $guzzleAdapter->queryResult();
    }

    public function test_queryResult_checkSuccessReturnsResult() {
        $mockedResponseBody = [
            [
                'drawn_at' => '2022-04-01T21:45:00+02:00',
                'addons' => [
                    [
                        'value' => "myMillionId"
                    ]
                ],
                'results' => [
                    [
                        'type' => 'number',
                        'value' => '01'
                    ]
                ]
            ]
        ];

        $mockedResponse = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], json_encode($mockedResponseBody)),
        ]);
        $handlerStack = HandlerStack::create($mockedResponse);
        $mockedGuzzleClient = new Client(['handler' => $handlerStack]);

        $guzzleAdapter = new GuzzleAdapter();

        $reflection = new \ReflectionClass($guzzleAdapter);
        $reflection_property = $reflection->getProperty('client');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($guzzleAdapter, $mockedGuzzleClient);

        $expectedResponse = new Result();
        $expectedResponse->setDate('2022-04-01T21:45:00+02:00');
        $expectedResponse->setMyMillionId("myMillionId");
        $expectedResponse->addNumber('number', '01');

        $response = $guzzleAdapter->queryResult();

        $this->assertEquals($expectedResponse, $response);
    }
}