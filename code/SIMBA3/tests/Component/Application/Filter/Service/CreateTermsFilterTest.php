<?php

namespace Component\Application\Filter\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Filter\Service\CreateTermsFilter;
use SIMBA3\Component\Domain\Filter\Service\MonthsFilter;

class CreateTermsFilterTest extends TestCase
{
    private CreateTermsFilter $createTermsFilter;

    /** @test */
    public function shouldCreateTermsFilterWithoutRawFiltersReturnEmptyTermsFilter(): void
    {
        $this->givenACreateTermsFilterWithoutRawFiltersTermsValues();
        $this->thenReturnTermsFiltersWithoutValues();
    }

    private function givenACreateTermsFilterWithoutRawFiltersTermsValues(): void
    {
        $this->createTermsFilter = new CreateTermsFilter(["years" => [2017, 2016]]);
    }

    private function thenReturnTermsFiltersWithoutValues(): void
    {
        $this->assertInstanceOf(MonthsFilter::class, $this->createTermsFilter->getFilter());
        $this->assertEquals(["months" => []], $this->createTermsFilter->getFilter()->getFilterAsArray());
    }

    /**
     * @dataProvider providerTermsFilterProvider
     * @test
     */
    public function shouldCreateTermsFilterWhenRawFilterFormatIsNotCorrectReturnAnEmptyTermsFilterTest(CreateTermsFilter $createTermsFilter): void
    {
        $this->assertEquals(["months" => []], $createTermsFilter->getFilter()->getFilterAsArray());
    }

    public function providerTermsFilterProvider(): array
    {
        return [
            [new CreateTermsFilter(["terms"])],
            [new CreateTermsFilter(["terms" => '1st trimester'])],
            [new CreateTermsFilter(["terms" => 2])],
            [new CreateTermsFilter( ["terms" => [[12]]] )],
            [new CreateTermsFilter( ["terms" => [-1]] )],
            [new CreateTermsFilter( ["terms" => [5]] )],
        ];
    }

    /** @test */
    public function shouldCreateTermsFilterWithRawFilterReturnTermsFilterWithValues(): void
    {
        $this->givenACreateTermsFiltersWithRawFilter();
        $this->thenReturnTermsFilterWithValues();
    }

    private function givenACreateTermsFiltersWithRawFilter(): void
    {
        $this->createTermsFilter = new CreateTermsFilter(["terms" => [1, 2, 3, 4]]);
    }

    private function thenReturnTermsFilterWithValues(): void
    {
        $this->assertInstanceOf(MonthsFilter::class, $this->createTermsFilter->getFilter());
        $this->assertEquals(
            [
                "months" => [
                    ["monthId" => 1],
                    ["monthId" => 2],
                    ["monthId" => 3],
                    ["monthId" => 4],
                ]
            ],
            $this->createTermsFilter->getFilter()->getFilterAsArray());
    }
}
