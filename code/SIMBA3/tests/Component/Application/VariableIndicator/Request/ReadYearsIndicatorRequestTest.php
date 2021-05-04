<?php

namespace Component\Application\VariableIndicator\Request;

use SIMBA3\Component\Application\VariableIndicator\Request\ReadYearsIndicatorRequest;
use PHPUnit\Framework\TestCase;

class ReadYearsIndicatorRequestTest extends TestCase
{
    private ReadYearsIndicatorRequest $readYearsIndicatorRequest;

    /** @test */
    public function shouldReadYearsIndicatorRequestReturnIndicatorIdAndLocale(): void
    {
        $this->givenAReadYearsIndicatorRequest();
        $this->thenReturnIndicatorIdAndLocale();
    }

    private function givenAReadYearsIndicatorRequest(): void
    {
        $this->readYearsIndicatorRequest = new ReadYearsIndicatorRequest(23, 'ca');
    }

    private function thenReturnIndicatorIdAndLocale(): void
    {
        $this->assertEquals(23, $this->readYearsIndicatorRequest->getIndicatorId());
        $this->assertEquals('ca', $this->readYearsIndicatorRequest->getLocale());
    }
}
