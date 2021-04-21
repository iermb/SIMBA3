<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

use SIMBA3\Component\Domain\Filter\Service\MonthFilter;

trait MonthTrait
{
    private static function getDQLMonth(array $filter): string
    {
        if (!isset($filter["months"]) || 1 > count($filter["months"])) {
            return '';
        }

        return " AND (" . implode(" OR ", array_map(function(array $month) {
            return "v.month = " . $month[MonthFilter::MONTH_ID_FIELD];
        }, $filter["months"])) . ")";
    }
}