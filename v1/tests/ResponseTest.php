<?php

use PHPUnit\Framework\TestCase;

require_once('v1/model/Response.php');

class ResponseTest extends TestCase
{
    /**
     * @test
     * @runInSeparateProcess
     */
    public function test_Send_ValidParameters_ReturnResponseData(): void
    {
        //given
        $response = new Response();
        $response->setSuccess(true);
        $response->setHttpStatusCode(200);
        $response->addMessage("Test message 1");
        $response->addMessage("Test Message 2");
        $response->send();

        //when
        $result = $response->getResponseData();


        //then
        $this->assertIsArray($result);
        $this->assertEquals($result['statusCode'], 200);
    }
}
