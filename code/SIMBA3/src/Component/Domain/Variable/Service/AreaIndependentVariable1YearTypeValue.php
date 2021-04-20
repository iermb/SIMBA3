<?php


namespace SIMBA3\Component\Domain\Variable\Service;

use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariablesFilter;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable1YearValueRepository;

class AreaIndependentVariable1YearTypeValue implements TypeValue
{
    private AreaIndependentVariable1YearValueRepository $areaIndependentVariable1YearValueRepository;
    private IndicatorFilter             $indicatorFilter;
    private AreasFilter                 $areasFilter;
    private IndependentVariablesFilter   $independentVariable1sFilter;
    private YearsFilter                 $yearsFilter;

    public function __construct(
        AreaIndependentVariable1YearValueRepository $areaIndependentVariable1YearValueRepository,
        IndicatorFilter $indicatorFilter,
        AreasFilter $areasFilter,
        IndependentVariablesFilter $independentVariable1sFilter,
        YearsFilter $yearsFilter
    ) {
        $this->areaIndependentVariable1YearValueRepository = $areaIndependentVariable1YearValueRepository;
        $this->indicatorFilter = $indicatorFilter;
        $this->areasFilter = $areasFilter;
        $this->independentVariable1sFilter = $independentVariable1sFilter;
        $this->yearsFilter = $yearsFilter;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        $filter = array_merge(
            $this->indicatorFilter->getFilterAsArray(),
            $this->areasFilter->getFilterAsArray(),
            $this->independentVariable1sFilter->getFilterAsArray(),
            $this->yearsFilter->getFilterAsArray()
        );

        return new AreaIndependentVariable1YearTypeValueArray($this->areaIndependentVariable1YearValueRepository->getValues($filter));
    }
}