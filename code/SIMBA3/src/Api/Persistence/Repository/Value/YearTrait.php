<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

use SIMBA3\Component\Domain\Filter\Service\YearFilter;

trait YearTrait
{
    private static function getDQLYear(array $filter): string
    {
        if (!isset($filter["years"]) || 1 > count($filter["years"])) {
            return '';
        }

        return " AND (" . implode(" OR ", array_map(function(array $year) {
            return "v.year = " . $year[YearFilter::YEAR_ID_FIELD];
        }, $filter["years"])) . ")";
    }
}