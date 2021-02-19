<?php

namespace Component\Domain\Filter\Service;

use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use PHPUnit\Framework\TestCase;

class IndicatorFilterTest extends TestCase
{
    private IndicatorFilter $indicatorFilter;

    /** @test */
    public function shouldIndicatorFilterReturnFilterAsArray(): void
    {
        $this->givenAnIndicatorFilter();
        $this->thenReturnIndicatorFilterAsArray();
    }

    private function givenAnIndicatorFilter(): void
    {
        $this->indicatorFilter = new IndicatorFilter(1001);
    }

    private function thenReturnIndicatorFilterAsArray(): void
    {
        $this->assertEquals(["indicatorId" => 1001], $this->indicatorFilter->getFilterAsArray());
    }

}
