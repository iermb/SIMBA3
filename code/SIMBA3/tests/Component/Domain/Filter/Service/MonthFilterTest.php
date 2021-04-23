<?php

namespace Component\Domain\Filter\Service;

use SIMBA3\Component\Domain\Filter\Service\MonthFilter;
use PHPUnit\Framework\TestCase;

class MonthFilterTest extends TestCase
{
    private MonthFilter $monthFilter;

    /** @test */
    public function shouldMonthFilterReturnMonthFilterAsArray(): void
    {
        $this->givenAnMonthFilter();
        $this->thenReturnMonthFilterAsArray();
    }

    private function givenAnMonthFilter(): void
    {
        $this->monthFilter = new MonthFilter(7);
    }

    private function thenReturnMonthFilterAsArray(): void
    {
        $this->assertEquals(["monthId" => 7], $this->monthFilter->getFilterAsArray());
    }

}
