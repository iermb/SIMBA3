<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class MonthsFilter implements FilterValues
{
    private const MONTHS_FIELD = "months";
    private array $monthsFilter;

    public function __construct(array $monthsFilter)
    {
        $this->monthsFilter = $monthsFilter;
    }

    public function getFilterAsArray(): array
    {
        return [ self::MONTHS_FIELD => array_map(function(MonthFilter $monthFilter) {
            return $monthFilter->getFilterAsArray();
        }, $this->monthsFilter)];
    }
}