<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariablesFilter;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable1YearValueRepository;

class AreaIndependentVariable1YearTypeValueTest extends TestCase
{
    private AreaIndependentVariable1YearTypeValue $areaIndependentVariable1YearTypeValue;
    private AreaIndependentVariable1YearValueRepository $areaIndependentVariable1YearValueRepository;
    private IndicatorFilter $indicatorFilter;
    private AreasFilter $areasFilter;
    private IndependentVariablesFilter $independentVariable1sFilter;
    private YearsFilter $yearsFilter;

    /** @test */
    public function shouldAreaIndependentVariable1YearTypeValueReturnTypeValueArray()
    {
        $this->givenAnAreaindependentVariable1YearTypeValue();
        $this->thenExpectsGetValuesFromRepository();
        $this->thenReturnTypeValueArray();
    }

    private function givenAnAreaindependentVariable1YearTypeValue(): void
    {
        $this->areaIndependentVariable1YearTypeValue = new AreaIndependentVariable1YearTypeValue(
            $this->areaIndependentVariable1YearValueRepository,
            $this->indicatorFilter,
            $this->areasFilter,
            $this->independentVariable1sFilter,
            $this->yearsFilter
        );
    }

    private function thenExpectsGetValuesFromRepository(): void
    {
        $this->areaIndependentVariable1YearValueRepository->expects($this->once())->method("getValues");
    }

    private function thenReturnTypeValueArray(): void
    {
        $this->assertInstanceOf(TypeValueArray::class, $this->areaIndependentVariable1YearTypeValue->getTypeValueArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->areaIndependentVariable1YearValueRepository = $this->createMock(AreaIndependentVariable1YearValueRepository::class);
        $this->indicatorFilter = $this->createMock(IndicatorFilter::class);
        $this->areasFilter = $this->createMock(AreasFilter::class);
        $this->independentVariable1sFilter = $this->createMock(IndependentVariablesFilter::class);
        $this->yearsFilter = $this->createMock(YearsFilter::class);
    }
}