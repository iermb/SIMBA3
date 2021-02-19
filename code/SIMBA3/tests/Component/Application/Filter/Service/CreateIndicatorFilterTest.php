<?php

namespace Component\Application\Filter\Service;

use SIMBA3\Component\Application\Filter\Service\CreateIndicatorFilter;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;

class CreateIndicatorFilterTest extends TestCase
{
    private CreateIndicatorFilter $createIndicatorFilter;

    /** @test */
    public function shouldCreateIndicatorFilterReturnIndicatorFilter(): void
    {
        $this->givenACreateIndicatorFilter();
        $this->thenReturnAIndicatorFilter();
    }

    private function givenACreateIndicatorFilter(): void
    {
        $this->createIndicatorFilter = new CreateIndicatorFilter(1001);
    }

    private function thenReturnAIndicatorFilter(): void
    {
        $this->assertInstanceOf(IndicatorFilter::class, $this->createIndicatorFilter->getFilter());
        $this->assertEquals(["indicatorId" => 1001], $this->createIndicatorFilter->getFilter()->getFilterAsArray());
    }


}
