<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class AreaYearTypeValueTest extends TestCase
{
    private AreaYearTypeValue       $areaYearTypeValue;
    private AreaYearValueRepository $areaYearValueRepository;
    private IndicatorFilter         $indicatorFilter;
    private AreasFilter             $areasFilter;
    private YearsFilter             $yearsFilter;

    /** @test */
    public function shouldAreaYearTypeValueReturnTypeValueArray(): void
    {
        $this->givenAnAreaYearTypeValue();
        $this->thenExpectsGetValuesFromRepository();
        $this->thenReturnTypeValueArray();
    }

    public function givenAnAreaYearTypeValue(): void
    {
        $this->areaYearTypeValue = new AreaYearTypeValue($this->areaYearValueRepository, $this->indicatorFilter,
            $this->areasFilter, $this->yearsFilter);
    }

    private function thenExpectsGetValuesFromRepository(): void
    {
        $this->areaYearValueRepository->expects($this->once())->method("getValues");
    }

    private function thenReturnTypeValueArray(): void
    {
            $this->assertInstanceOf(TypeValueArray::class, $this->areaYearTypeValue->getTypeValueArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->areaYearValueRepository = $this->createMock(AreaYearValueRepository::class);
        $this->indicatorFilter = $this->createMock(IndicatorFilter::class);
        $this->areasFilter = $this->createMock(AreasFilter::class);
        $this->yearsFilter = $this->createMock(YearsFilter::class);
    }
}
