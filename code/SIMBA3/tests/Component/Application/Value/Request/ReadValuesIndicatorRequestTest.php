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
        $this->thenReturnLocaleIndicatorIdAndFilters();
    }

    private function givenAReadValuesIndicatorRequest(): void
    {
        $this->readValuesIndicatorRequest = new ReadValuesIndicatorRequest('fr', 34, $this->filters);
    }

    private function thenReturnLocaleIndicatorIdAndFilters(): void
    {
        $this->assertEquals('fr', $this->readValuesIndicatorRequest->getLocale());
        $this->assertEquals(34, $this->readValuesIndicatorRequest->getIndicatorId());
        $this->assertSame($this->filters, $this->readValuesIndicatorRequest->getFilters());
    }
}
