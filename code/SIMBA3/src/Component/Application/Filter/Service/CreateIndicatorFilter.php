<?php


namespace SIMBA3\Component\Application\Filter\Service;


use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;

class CreateIndicatorFilter implements CreateFilterValues
{
    private int $indicatorId;

    public function __construct(int $indicatorId)
    {
        $this->indicatorId = $indicatorId;
    }

    public function getFilter(): IndicatorFilter
    {
        return new IndicatorFilter($this->indicatorId);
    }
}