<?php

namespace Component\Domain\Filter\Service;

use SIMBA3\Component\Domain\Filter\Service\YearFilter;
use PHPUnit\Framework\TestCase;

class YearFilterTest extends TestCase
{
    private YearFilter $yearFilter;

    /** @test */
    public function shouldYearFilterReturnYearFilterAsArray(): void
    {
        $this->givenAnYearFilter();
        $this->thenReturnYearFilterAsArray();
    }

    private function givenAnYearFilter(): void
    {
        $this->yearFilter = new YearFilter(2020);
    }

    private function thenReturnYearFilterAsArray(): void
    {
        $this->assertEquals(["yearId" => 2020], $this->yearFilter->getFilterAsArray());
    }

}
