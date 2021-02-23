<?php

namespace SIMBA3\Component\Application\Value\Request;

use PHPUnit\Framework\TestCase;

class ReadValuesIndicatorRequestTest extends TestCase
{
    private ReadValuesIndicatorRequest $readValuesIndicatorRequest;
    private array $filters;

    protected function setUp(): void
    {
        parent::setUp();
        $this->filters = array();
    }

    /** @test */
    public function shouldReadValuesIndicatorRequestReturnIndicatorId(): void
    {
        $this->givenAReadValuesIndicatorRequest();
        $this->thenReturnIndicatorId();
    }

    private function givenAReadValuesIndicatorRequest(): void
    {
        $this->readValuesIndicatorRequest = new ReadValuesIndicatorRequest(34, $this->filters);
    }

    private function thenReturnIndicatorId(): void
    {
        $this->assertEquals(34, $this->readValuesIndicatorRequest->getIndicatorId());
        $this->assertSame($this->filters, $this->readValuesIndicatorRequest->getFilters());
    }
}
