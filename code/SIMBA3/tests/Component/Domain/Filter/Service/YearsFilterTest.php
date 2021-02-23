<?php

namespace Component\Domain\Filter\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\YearFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;

class YearsFilterTest extends TestCase
{
    private YearsFilter $yearsFilter;
    private YearFilter  $yearFilter1;
    private YearFilter  $yearFilter2;

    /** @test */
    public function shouldYearsFiltersWithoutYearFilterReturnEmptyArray(): void
    {
        $this->givenAnYearsFilterWithoutYearFilter();
        $this->thenYearsFilterReturnEmptyArray();
    }

    private function givenAnYearsFilterWithoutYearFilter(): void
    {
        $this->yearsFilter = new YearsFilter([]);
    }

    /** @test */
    public function shouldYearsFilterWithOneYearFilterReturnArrayWithOneElement(): void
    {
        $this->givenAnYearsFilterWithOneYearFilter();
        $this->thenYearsFilterReturnArrayWithOneElement();
    }

    /** @test */
    public function shouldYearsFilterWithTwoYearFiltersReturnArrayWithTwoElements(): void
    {
        $this->givenAnYearsFilterWithTwoYearFilters();
        $this->thenYearsFilterReturnArrayWithTwoElements();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->yearFilter1 = $this->createMock(YearFilter::class);
        $this->yearFilter2 = $this->createMock(YearFilter::class);
    }

    private function givenAnYearsFilterWithOneYearFilter(): void
    {
        $this->yearsFilter = new YearsFilter([$this->yearFilter1]);
        $this->givenAnYearFilter();
    }

    private function givenAnYearsFilterWithTwoYearFilters(): void
    {
        $this->yearsFilter = new YearsFilter([$this->yearFilter1, $this->yearFilter2]);
        $this->givenTwoYearFilters();
    }

    private function givenTwoYearFilters(): void
    {
        $this->givenAnYearFilter();
        $this->yearFilter2->method("getFilterAsArray")->willReturn(["year" => 2019]);
    }

    private function givenAnYearFilter(): void
    {
        $this->yearFilter1->method("getFilterAsArray")->willReturn(["year" => 2020]);
    }

    private function thenYearsFilterReturnEmptyArray(): void
    {
        $this->assertEquals(["years" => []], $this->yearsFilter->getFilterAsArray());
    }

    private function thenYearsFilterReturnArrayWithOneElement(): void
    {
        $this->assertEquals(["years" => [["year" => 2020]]], $this->yearsFilter->getFilterAsArray());
    }

    private function thenYearsFilterReturnArrayWithTwoElements(): void
    {
        //print_r($this->yearsFilter->getFilterAsArray());
        $this->assertEquals(["years" => [["year" => 2020], ["year" => 2019]]], $this->yearsFilter->getFilterAsArray());
    }

}
