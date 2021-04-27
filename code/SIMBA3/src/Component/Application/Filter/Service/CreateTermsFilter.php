<?php

namespace SIMBA3\Component\Application\Filter\Service;

use SIMBA3\Component\Domain\Filter\Service\MonthFilter;
use SIMBA3\Component\Domain\Filter\Service\MonthsFilter;

class CreateTermsFilter implements CreateFilterValues
{
    private const TERM_FILTER = "terms";
    private array $rawFilter;

    public function __construct(array $rawFilter)
    {
        $this->rawFilter = $rawFilter;
    }

    public function getFilter(): MonthsFilter
    {
        if (!isset($this->rawFilter[self::TERM_FILTER])) {
            return new MonthsFilter([]);
        }

        if (!is_array($this->rawFilter[self::TERM_FILTER])) {
            return new MonthsFilter([]);
        }

        $this->rawFilter[self::TERM_FILTER] = array_filter($this->rawFilter[self::TERM_FILTER], function($element){
            if (!is_int($element)) {
                return false;
            }

            if($element < 1 || $element > 4) {
                return false;
            }

            return true;
        });

        return new MonthsFilter(array_map(array($this, "createMonthFilter"), $this->rawFilter[self::TERM_FILTER]));
    }

    private function createMonthFilter(int $term): MonthFilter
    {
        return new MonthFilter($term);
    }
}