<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

trait YearTrait
{
    private static function getDQLYear(array $filter): string
    {
        if (!isset($filter["years"]) || 1 > count($filter["years"])) {
            return '';
        }

        return " AND (" . implode(" OR ", array_map(function(array $year) {
            return "v.year = " . $year["year"];
        }, $filter["years"])) . ")";
    }
}