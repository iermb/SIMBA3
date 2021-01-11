<?php

namespace SIMBA3\Component\Application\Indicator\Request;

use PHPUnit\Framework\TestCase;

class ReadInfoIndicatorRequestTest extends TestCase
{
    private ReadInfoIndicatorRequest $readInfoIndicatorRequest;

    /** @test */
    public function shouldReadInfoIndicatorRequestReturnIndicatorId(): void
    {
        $this->givenAReadInfoIndicatorRequest();
        $this->thenReadInfoIndicatorRequestReturnIndicatorId();
    }

    private function givenAReadInfoIndicatorRequest(): void
    {
        $this->readInfoIndicatorRequest = new ReadInfoIndicatorRequest(34);
    }

    private function thenReadInfoIndicatorRequestReturnIndicatorId(): void
    {
        $this->assertEquals(34, $this->readInfoIndicatorRequest->getIndicatorId());
    }
}
