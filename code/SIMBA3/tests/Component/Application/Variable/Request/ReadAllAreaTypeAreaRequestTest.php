<?php

namespace SIMBA3\Component\Application\Variable\Request;

use PHPUnit\Framework\TestCase;

class ReadAllAreaTypeAreaRequestTest extends TestCase
{
    private ReadAllAreaTypeAreaRequest $readAllAreaTypeAreaRequest;

    /** @test */
    public function shouldReadAllAreaTypeAreaRequestReturnTypeAreaId()
    {
        $this->givenReadAllAreaTypeAreaRequest();
        $this->thenReadAllAreaTypeAreaRequestReturnTypeAreaId();
    }

    private function givenReadAllAreaTypeAreaRequest()
    {
        $this->readAllAreaTypeAreaRequest = new ReadAllAreaTypeAreaRequest(55);
    }

    private function thenReadAllAreaTypeAreaRequestReturnTypeAreaId()
    {
        $this->assertEquals(55, $this->readAllAreaTypeAreaRequest->getTypeAreaId());
    }
}