<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Filter\Service\MonthsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaMonthYearValueRepository;

class AreaMonthYearTypeValueTest extends TestCase
{
    private AreaMonthYearTypeValue          $areaMonthYearTypeValue;
    private AreaMonthYearValueRepository    $areaMonthYearValueRepository;
    private IndicatorFilter                 $indicatorFilter;
    private AreasFilter                     $areasFilter;
    private YearsFilter                     $yearsFilter;
    private MonthsFilter                    $monthFilter;

    /** @test */
    public function shouldAreaMonthYearTypeValueReturnTypeValueArray(): void
    {
        $this->givenAnAreaMonthYearTypeValue();
        $this->thenExpectsGetValuesFromRepository();
        $this->thenReturnTypeValueArray();
    }

    public function givenAnAreaMonthYearTypeValue(): void
    {
        $this->areaMonthYearTypeValue = new AreaMonthYearTypeValue(
            $this->areaMonthYearValueRepository,
            $this->indicatorFilter,
            $this->areasFilter,
            $this->monthFilter,
            $this->yearsFilter);
    }

    private function thenExpectsGetValuesFromRepository(): void
    {
        $this->areaMonthYearValueRepository->expects($this->once())->method("getValues");
    }

    private function thenReturnTypeValueArray(): void
    {
            $this->assertInstanceOf(TypeValueArray::class, $this->areaMonthYearTypeValue->getTypeValueArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->areaMonthYearValueRepository = $this->createMock(AreaMonthYearValueRepository::class);
        $this->indicatorFilter = $this->createMock(IndicatorFilter::class);
        $this->areasFilter = $this->createMock(AreasFilter::class);
        $this->yearsFilter = $this->createMock(YearsFilter::class);
        $this->monthFilter = $this->createMock(MonthsFilter::class);
    }
}
