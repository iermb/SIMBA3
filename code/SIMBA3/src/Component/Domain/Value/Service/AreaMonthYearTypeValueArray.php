<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Value\Entity\AreaMonthYearValue;

class AreaMonthYearTypeValueArray extends TypeValueArray
{
    private array $listAreaMonthYearValue;

    public function __construct(array $listAreaMonthYearValue)
    {
        $this->listAreaMonthYearValue = $listAreaMonthYearValue;
    }

    public function getValues(): array
    {
        return $this->listAreaMonthYearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getAreaMonthYearTypeValueAsArray"),
            $this->listAreaMonthYearValue);
    }

    public function getAreas(): array
    {
        return $this->uniqueArray(array_map(function (
            AreaMonthYearValue $areaMonthYearValue
        ) {
            return [
                self::CODE_TYPE_AREA_FIELD => $areaMonthYearValue->getTypeAreaCode(),
                self::CODE_AREA_FIELD => $areaMonthYearValue->getAreaCode()
            ];
        }, $this->listAreaMonthYearValue));
    }

    public function getMonths(): array
    {
        return $this->uniqueArray(array_map(function (
            AreaMonthYearValue $areaMonthYearValue
        ) {
            return [self::CODE_MONTH => $areaMonthYearValue->getMonth()];
        }, $this->listAreaMonthYearValue));
    }

    public function getYears(): array
    {
        return $this->uniqueArray(array_map(function (
            AreaMonthYearValue $areaMonthYearValue
        ) {
            return [self::CODE_YEAR => $areaMonthYearValue->getYear()];
        }, $this->listAreaMonthYearValue));
    }

    private function getAreaMonthYearTypeValueAsArray(
        AreaMonthYearValue $areaMonthYearValue
    ): array {
        return [
            $areaMonthYearValue->getIndicatorId(),
            $areaMonthYearValue->getTypeAreaCode(),
            $areaMonthYearValue->getAreaCode(),
            $areaMonthYearValue->getYear(),
            $areaMonthYearValue->getMonth(),
            $areaMonthYearValue->getValue()
        ];
    }
}