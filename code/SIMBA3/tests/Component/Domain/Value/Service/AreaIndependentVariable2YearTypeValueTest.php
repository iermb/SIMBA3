<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariablesFilter;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable2YearValueRepository;

class AreaIndependentVariable2YearTypeValueTest extends TestCase
{
    private AreaIndependentVariable2YearTypeValue $areaIndependentVariable2YearTypeValue;
    private AreaIndependentVariable2YearValueRepository $areaIndependentVariable2YearValueRepository;
    private IndicatorFilter $indicatorFilter;
    private AreasFilter $areasFilter;
    private IndependentVariablesFilter $independentVariable1sFilter;
    private IndependentVariablesFilter $independentVariable2sFilter;
    private YearsFilter $yearsFilter;

    /** @test */
    public function shouldAreaIndependentVariable2YearTypeValueReturnTypeValueArray()
    {
        $this->givenAnAreaindependentVariable2YearTypeValue();
        $this->thenExpectsGetValuesFromRepository();
        $this->thenReturnTypeValueArray();
    }

    private function givenAnAreaindependentVariable2YearTypeValue(): void
    {
        $this->areaIndependentVariable2YearTypeValue = new AreaIndependentVariable2YearTypeValue(
            $this->areaIndependentVariable2YearValueRepository,
            $this->indicatorFilter,
            $this->areasFilter,
            $this->independentVariable1sFilter,
            $this->independentVariable2sFilter,
            $this->yearsFilter
        );
    }

    private function thenExpectsGetValuesFromRepository(): void
    {
        $this->areaIndependentVariable2YearValueRepository->expects($this->once())->method("getValues");
    }

    private function thenReturnTypeValueArray(): void
    {
        $this->assertInstanceOf(TypeValueArray::class, $this->areaIndependentVariable2YearTypeValue->getTypeValueArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->areaIndependentVariable2YearValueRepository = $this->createMock(AreaIndependentVariable2YearValueRepository::class);
        $this->indicatorFilter = $this->createMock(IndicatorFilter::class);
        $this->areasFilter = $this->createMock(AreasFilter::class);
        $this->independentVariable1sFilter = $this->createMock(IndependentVariablesFilter::class);
        $this->independentVariable2sFilter = $this->createMock(IndependentVariablesFilter::class);
        $this->yearsFilter = $this->createMock(YearsFilter::class);
    }
}