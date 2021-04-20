<?php


namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariablesFilter;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable2YearValueRepository;

class AreaIndependentVariable2YearTypeValue implements TypeValue
{
    private AreaIndependentVariable2YearValueRepository $areaIndependentVariable2YearValueRepository;
    private IndicatorFilter             $indicatorFilter;
    private AreasFilter                 $areasFilter;
    private IndependentVariablesFilter   $independentVariable1sFilter;
    private IndependentVariablesFilter   $independentVariable2sFilter;
    private YearsFilter                 $yearsFilter;

    public function __construct(
        AreaIndependentVariable2YearValueRepository $areaIndependentVariable2YearValueRepository,
        IndicatorFilter $indicatorFilter,
        AreasFilter $areasFilter,
        IndependentVariablesFilter $independentVariable1sFilter,
        IndependentVariablesFilter $independentVariable2sFilter,
        YearsFilter $yearsFilter
    ) {
        $this->areaIndependentVariable2YearValueRepository = $areaIndependentVariable2YearValueRepository;
        $this->indicatorFilter = $indicatorFilter;
        $this->areasFilter = $areasFilter;
        $this->independentVariable1sFilter = $independentVariable1sFilter;
        $this->independentVariable2sFilter = $independentVariable2sFilter;
        $this->yearsFilter = $yearsFilter;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        $filter = array_merge(
            $this->indicatorFilter->getFilterAsArray(),
            $this->areasFilter->getFilterAsArray(),
            $this->independentVariable1sFilter->getFilterAsArray(),
            $this->independentVariable2sFilter->getFilterAsArray(),
            $this->yearsFilter->getFilterAsArray()
        );
        return new AreaIndependentVariable2YearTypeValueArray($this->areaIndependentVariable2YearValueRepository->getValues($filter));
    }
}