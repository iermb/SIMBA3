<?php

namespace Component\Domain\Filter\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\MonthFilter;
use SIMBA3\Component\Domain\Filter\Service\MonthsFilter;

class MonthsFilterTest extends TestCase
{
    private MonthsFilter $monthsFilter;
    private MonthFilter  $monthFilter1;
    private MonthFilter  $monthFilter2;

    /** @test */
    public function shouldMonthsFiltersWithoutMonthFilterReturnEmptyArray(): void
    {
        $this->givenAnMonthsFilterWithoutMonthFilter();
        $this->thenMonthsFilterReturnEmptyArray();
    }

    private function givenAnMonthsFilterWithoutMonthFilter(): void
    {
        $this->monthsFilter = new MonthsFilter([]);
    }

    /** @test */
    public function shouldMonthsFilterWithOneMonthFilterReturnArrayWithOneElement(): void
    {
        $this->givenAnMonthsFilterWithOneMonthFilter();
        $this->thenMonthsFilterReturnArrayWithOneElement();
    }

    /** @test */
    public function shouldMonthsFilterWithTwoMonthFiltersReturnArrayWithTwoElements(): void
    {
        $this->givenAnMonthsFilterWithTwoMonthFilters();
        $this->thenMonthsFilterReturnArrayWithTwoElements();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->monthFilter1 = $this->createMock(MonthFilter::class);
        $this->monthFilter2 = $this->createMock(MonthFilter::class);
    }

    private function givenAnMonthsFilterWithOneMonthFilter(): void
    {
        $this->monthsFilter = new MonthsFilter([$this->monthFilter1]);
        $this->givenAnMonthFilter();
    }

    private function givenAnMonthsFilterWithTwoMonthFilters(): void
    {
        $this->monthsFilter = new MonthsFilter([$this->monthFilter1, $this->monthFilter2]);
        $this->givenTwoMonthFilters();
    }

    private function givenTwoMonthFilters(): void
    {
        $this->givenAnMonthFilter();
        $this->monthFilter2->method("getFilterAsArray")->willReturn(["month" => 10]);
    }

    private function givenAnMonthFilter(): void
    {
        $this->monthFilter1->method("getFilterAsArray")->willReturn(["month" => 9]);
    }

    private function thenMonthsFilterReturnEmptyArray(): void
    {
        $this->assertEquals(["months" => []], $this->monthsFilter->getFilterAsArray());
    }

    private function thenMonthsFilterReturnArrayWithOneElement(): void
    {
        $this->assertEquals(["months" => [["monthId" => 9]]], $this->monthsFilter->getFilterAsArray());
    }

    private function thenMonthsFilterReturnArrayWithTwoElements(): void
    {
        $this->assertEquals(["months" => [["monthId" => 9], ["monthId" => 10]]], $this->monthsFilter->getFilterAsArray());
    }

}
