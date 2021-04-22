<?php


namespace SIMBA3\Component\Application\Filter\Service;


use SIMBA3\Component\Domain\Filter\Service\MonthFilter;
use SIMBA3\Component\Domain\Filter\Service\MonthsFilter;

class CreateMonthsFilter implements CreateFilterValues
{
    private const MONTH_FILTER = "months";
    private array $rawFilter;

    public function __construct(array $rawFilter)
    {
        $this->rawFilter = $rawFilter;
    }

    public function getFilter(): MonthsFilter
    {
        if (!isset($this->rawFilter[self::MONTH_FILTER])) {
            return new MonthsFilter([]);
        }

        if (!is_array($this->rawFilter[self::MONTH_FILTER])) {
            return new MonthsFilter([]);
        }

        $this->rawFilter[self::MONTH_FILTER] = array_filter($this->rawFilter[self::MONTH_FILTER], function($element){
            if (!is_int($element)) {
                return false;
            }

            return true;
        });

        return new MonthsFilter(array_map(array($this, "createMonthFilter"), $this->rawFilter[self::MONTH_FILTER]));
    }

    private function createMonthFilter(int $month): MonthFilter
    {
        return new MonthFilter($month);
    }
}