<?php

namespace Component\Domain\Filter\Service;

use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use PHPUnit\Framework\TestCase;

class AreaFilterTest extends TestCase
{
    private AreaFilter $areaFilter;

    /** @test */
    public function shouldAreaFilterReturnFilterAsArray(): void
    {
        $this->givenAnAreaFilter();
        $this->thenReturnFilterAsArray();
    }

    private function givenAnAreaFilter(): void
    {
        $this->areaFilter = new AreaFilter(101, 8019);
    }

    private function thenReturnFilterAsArray(): void
    {
        $this->assertEquals(["typeAreaCode" => 101, "areaCode" => 8019], $this->areaFilter->getFilterAsArray());
    }

}
