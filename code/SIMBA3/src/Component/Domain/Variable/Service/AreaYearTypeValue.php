<?php


namespace SIMBA3\Component\Domain\Variable\Service;

use SIMBA3\Component\Domain\Filter\Service\AreasFilter;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class AreaYearTypeValue implements TypeValue
{
    private AreaYearValueRepository $areaYearValueRepository;
    private IndicatorFilter         $indicatorFilter;
    private AreasFilter             $areasFilter;
    private YearsFilter             $yearsFilter;

    public function __construct(
        AreaYearValueRepository $areaYearValueRepository,
        IndicatorFilter $indicatorFilter,
        AreasFilter $areasFilter,
        YearsFilter $yearsFilter
    ) {
        $this->areaYearValueRepository = $areaYearValueRepository;
        $this->indicatorFilter = $indicatorFilter;
        $this->areasFilter = $areasFilter;
        $this->yearsFilter = $yearsFilter;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        $filter = array_merge($this->indicatorFilter->getFilterAsArray(), $this->areasFilter->getFilterAsArray(),
            $this->yearsFilter->getFilterAsArray());
        return new AreaYearTypeValueArray($this->areaYearValueRepository->getValues($filter));
    }
}