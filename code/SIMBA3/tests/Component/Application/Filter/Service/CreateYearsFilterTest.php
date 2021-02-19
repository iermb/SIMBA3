<?php

namespace Component\Application\Filter\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Filter\Service\CreateYearsFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;

class CreateYearsFilterTest extends TestCase
{
    private CreateYearsFilter $createYearsFilter;

    /** @test */
    public function shouldCreateYearsFilterWithoutRawFiltersReturnEmptyYearsFilter(): void
    {
        $this->givenACreateYearsFilterWithoutRawFiltersYearsValues();
        $this->thenReturnYearsFiltersWithoutValues();
    }

    private function givenACreateYearsFilterWithoutRawFiltersYearsValues(): void
    {
        $this->createYearsFilter = new CreateYearsFilter(["areas" => [[101, 8019]]]);
    }

    private function thenReturnYearsFiltersWithoutValues(): void
    {
        $this->assertInstanceOf(YearsFilter::class, $this->createYearsFilter->getFilter());
        $this->assertEquals(["years" => []], $this->createYearsFilter->getFilter()->getFilterAsArray());
    }

    /** @test */
    public function shouldCreateYearsFilterWithRawFilterReturnYearsFilterWithValues(): void
    {
        $this->givenACreateYearsFiltersWithRawFilter();
        $this->thenReturnYearsFilterWithValues();
    }

    private function givenACreateYearsFiltersWithRawFilter(): void
    {
        $this->createYearsFilter = new CreateYearsFilter(["years" => [2020, 2019, 2018]]);
    }

    private function thenReturnYearsFilterWithValues(): void
    {
        $this->assertInstanceOf(YearsFilter::class, $this->createYearsFilter->getFilter());
        $this->assertEquals(["years" => [["year" => 2020], ["year" => 2019], ["year" => 2018]]],
            $this->createYearsFilter->getFilter()->getFilterAsArray());
    }


}
