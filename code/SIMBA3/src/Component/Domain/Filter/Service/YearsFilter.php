<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class YearsFilter implements FilterValues
{
    private const YEARS_FIELD = "years";
    private array $yearsFilter;

    public function __construct(array $yearsFilter)
    {
        $this->yearsFilter = $yearsFilter;
    }

    public function getFilterAsArray(): array
    {
        return [ self::YEARS_FIELD => array_map(function(YearFilter $yearFilter) {
            return $yearFilter->getFilterAsArray();
        }, $this->yearsFilter)];
    }
}