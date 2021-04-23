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

    /**
     * @dataProvider providerMonthsFilterProvider
     * @test
     */
    public function shouldCreateMonthsFilterWhenRawFilterFormatIsNotCorrectReturnAnEmptyMonthsFilterTest(CreateYearsFilter $createMonthsFilter): void
    {
        $this->assertEquals(["years" => []], $createMonthsFilter->getFilter()->getFilterAsArray());
    }

    public function providerMonthsFilterProvider(): array
    {
        return [
            [new CreateYearsFilter(["years"])],
            [new CreateYearsFilter(["years" => 'something written'])],
            [new CreateYearsFilter(["years" => 12])],
            [new CreateYearsFilter(["years" => [[12]]])],
        ];
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
        $this->assertEquals(["years" => [["yearId" => 2020], ["yearId" => 2019], ["yearId" => 2018]]],
            $this->createYearsFilter->getFilter()->getFilterAsArray());
    }
}