<?php


namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\FilterValues;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\MonthsFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaMonthYearValueRepository;

class AreaMonthYearTypeValue implements TypeValue
{
    private AreaMonthYearValueRepository $areaMonthYearValueRepository;
    private IndicatorFilter         $indicatorFilter;
    private AreasFilter             $areasFilter;
    private FilterValues            $monthsTermsFilter;
    private YearsFilter             $yearsFilter;

    public function __construct(
        AreaMonthYearValueRepository $areaMonthYearValueRepository,
        IndicatorFilter $indicatorFilter,
        AreasFilter $areasFilter,
        FilterValues $monthsTermsFilter,
        YearsFilter $yearsFilter
    ) {
        $this->areaMonthYearValueRepository = $areaMonthYearValueRepository;
        $this->indicatorFilter = $indicatorFilter;
        $this->areasFilter = $areasFilter;
        $this->monthsTermsFilter = $monthsTermsFilter;
        $this->yearsFilter = $yearsFilter;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        $filter = array_merge(
            $this->indicatorFilter->getFilterAsArray(),
            $this->areasFilter->getFilterAsArray(),
            $this->monthsTermsFilter->getFilterAsArray(),
            $this->yearsFilter->getFilterAsArray()
        );
        return new AreaMonthYearTypeValueArray($this->areaMonthYearValueRepository->getValues($filter));
    }
}