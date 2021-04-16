<?php


namespace SIMBA3\Component\Domain\Variable\Service;

use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class YearTypeValue implements TypeValue
{
    private YearValueRepository $yearValueRepository;
    private IndicatorFilter     $indicatorFilter;
    private YearsFilter         $yearsFilter;

    public function __construct(
        YearValueRepository $yearValueRepository,
        IndicatorFilter $indicatorFilter,
        YearsFilter $yearsFilter
    ) {
        $this->yearValueRepository = $yearValueRepository;
        $this->indicatorFilter = $indicatorFilter;
        $this->yearsFilter = $yearsFilter;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        $filters = array_merge($this->indicatorFilter->getFilterAsArray(), $this->yearsFilter->getFilterAsArray());
        return new YearTypeValueArray($this->yearValueRepository->getValues($filters));
    }
}