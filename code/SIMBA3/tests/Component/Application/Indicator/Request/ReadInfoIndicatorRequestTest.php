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
        $this->thenReadInfoIndicatorRequestReturnIndicatorLocaleAndId();
    }

    private function givenAReadInfoIndicatorRequest(): void
    {
        $this->readInfoIndicatorRequest = new ReadInfoIndicatorRequest('es',34);
    }

    private function thenReadInfoIndicatorRequestReturnIndicatorLocaleAndId(): void
    {
        $this->assertEquals('es', $this->readInfoIndicatorRequest->getLocale());
        $this->assertEquals(34, $this->readInfoIndicatorRequest->getIndicatorId());
    }
}
