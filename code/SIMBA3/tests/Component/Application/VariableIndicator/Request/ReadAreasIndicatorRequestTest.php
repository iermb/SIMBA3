<?php

namespace Component\Application\VariableIndicator\Request;

use SIMBA3\Component\Application\VariableIndicator\Request\ReadAreasIndicatorRequest;
use PHPUnit\Framework\TestCase;

class ReadAreasIndicatorRequestTest extends TestCase
{
    private ReadAreasIndicatorRequest $readAreasIndicatorRequest;

    /** @test */
    public function shouldReadAreasIndicatorRequestReturnIndicatorIdAndLanguage(): void
    {
        $this->givenAReadAreasIndicatorRequest();
        $this->thenReturnIndicatorIdAndLanguage();
    }

    private function givenAReadAreasIndicatorRequest(): void
    {
        $this->readAreasIndicatorRequest = new ReadAreasIndicatorRequest(1001, 'ca');
    }

    private function thenReturnIndicatorIdAndLanguage(): void
    {
        $this->assertEquals(1001, $this->readAreasIndicatorRequest->getIndicatorId());
        $this->assertEquals('ca', $this->readAreasIndicatorRequest->getLocale());
    }

}
