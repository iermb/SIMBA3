<?php

namespace Component\Application\Filter\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Filter\Service\CreateMonthsFilter;
use SIMBA3\Component\Domain\Filter\Service\MonthsFilter;

class CreateMonthsFilterTest extends TestCase
{
    private CreateMonthsFilter $createMonthsFilter;

    /** @test */
    public function shouldCreateMonthsFilterWithoutRawFiltersReturnEmptyMonthsFilter(): void
    {
        $this->givenACreateMonthsFilterWithoutRawFiltersMonthsValues();
        $this->thenReturnMonthsFiltersWithoutValues();
    }

    private function givenACreateMonthsFilterWithoutRawFiltersMonthsValues(): void
    {
        $this->createMonthsFilter = new CreateMonthsFilter(["years" => [2017, 2016]]);
    }

    private function thenReturnMonthsFiltersWithoutValues(): void
    {
        $this->assertInstanceOf(MonthsFilter::class, $this->createMonthsFilter->getFilter());
        $this->assertEquals(["months" => []], $this->createMonthsFilter->getFilter()->getFilterAsArray());
    }

    /**
     * @dataProvider providerMonthsFilterProvider
     * @test
     */
    public function shouldCreateMonthsFilterWhenRawFilterFormatIsNotCorrectReturnAnEmptyMonthsFilterTest(CreateMonthsFilter $createMonthsFilter): void
    {
        $this->assertEquals(["months" => []], $createMonthsFilter->getFilter()->getFilterAsArray());
    }

    public function providerMonthsFilterProvider(): array
    {
        return [
            [new CreateMonthsFilter(["months"])],
            [new CreateMonthsFilter(["months" => 'april'])],
            [new CreateMonthsFilter(["months" => 12])],
            [new CreateMonthsFilter(["months" => [[12]]])],
        ];
    }

    /** @test */
    public function shouldCreateMonthsFilterWithRawFilterReturnMonthsFilterWithValues(): void
    {
        $this->givenACreateMonthsFiltersWithRawFilter();
        $this->thenReturnMonthsFilterWithValues();
    }

    private function givenACreateMonthsFiltersWithRawFilter(): void
    {
        $this->createMonthsFilter = new CreateMonthsFilter(["months" => [2, 3, 6]]);
    }

    private function thenReturnMonthsFilterWithValues(): void
    {
        $this->assertInstanceOf(MonthsFilter::class, $this->createMonthsFilter->getFilter());
        $this->assertEquals(["months" => [["monthId" => 2], ["monthId" => 3], ["monthId" => 6]]],
            $this->createMonthsFilter->getFilter()->getFilterAsArray());
    }


}
