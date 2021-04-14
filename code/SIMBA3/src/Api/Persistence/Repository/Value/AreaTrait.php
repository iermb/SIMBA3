<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use SIMBA3\Component\Domain\Filter\Service\AreaFilter;

trait AreaTrait
{
    private static function getDQLArea(array $filter): string
    {
        if (!isset($filter["areas"]) || 1 > count($filter["areas"])) {
            return '';
        }

        return " AND (" . implode(" OR ", array_map(function(array $area) {
            return "(v.typeAreaCode = " . $area[AreaFilter::TYPE_AREA_CODE_FIELD] . " AND v.areaCode = " . $area[AreaFilter::AREA_CODE_FIELD] . ")";
        }, $filter["areas"])) . ")";
    }
}