<?php


namespace SIMBA3\Component\Application\Filter\Service;


use SIMBA3\Component\Domain\Filter\Service\YearFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;

class CreateYearsFilter implements CreateFilterValues
{
    private const YEAR_FILTER = "years";
    private array $rawFilter;

    public function __construct(array $rawFilter)
    {
        $this->rawFilter = $rawFilter;
    }

    public function getFilter(): YearsFilter
    {
        if (!isset($this->rawFilter[self::YEAR_FILTER])) {
            return new YearsFilter([]);
        }

        if (!is_array($this->rawFilter[self::YEAR_FILTER])) {
            return new YearsFilter([]);
        }

        $this->rawFilter[self::YEAR_FILTER] = array_filter($this->rawFilter[self::YEAR_FILTER], function($element){
            if (!is_int($element)) {
                return false;
            }

            if($element < 0) {
                return false;
            }

            return true;
        });

        return new YearsFilter(array_map(array($this, "createYearFilter"), $this->rawFilter[self::YEAR_FILTER]));
    }

    private function createYearFilter(int $year): YearFilter
    {
        return new YearFilter($year);
    }
}