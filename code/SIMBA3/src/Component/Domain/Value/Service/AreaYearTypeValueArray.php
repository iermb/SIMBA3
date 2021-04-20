<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;

class AreaYearTypeValueArray extends TypeValueArray
{
    private array $listAreaYearValue;

    public function __construct(array $listAreaYearValue)
    {
        $this->listAreaYearValue = $listAreaYearValue;
    }

    public function getValues(): array
    {
        return $this->listAreaYearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getAreaYearTypeValueAsArray"), $this->listAreaYearValue);
    }

    public function getAreas(): array
    {
        return $this->uniqueArray(array_map(function (
            AreaYearValue $areaYearValue
        ) {
            return [
                self::CODE_TYPE_AREA_FIELD => $areaYearValue->getTypeAreaCode(),
                self::CODE_AREA_FIELD => $areaYearValue->getAreaCode()
            ];
        }, $this->listAreaYearValue));
    }

    public function getYears(): array
    {
        return $this->uniqueArray(array_map(function (
            AreaYearValue $areaYearValue
        ) {
            return [self::CODE_YEAR => $areaYearValue->getYear()];
        }, $this->listAreaYearValue));
    }

    private function getAreaYearTypeValueAsArray(AreaYearValue $areaYearValue): array
    {
        return [
            $areaYearValue->getIndicatorId(),
            $areaYearValue->getTypeAreaCode(),
            $areaYearValue->getAreaCode(),
            $areaYearValue->getYear(),
            $areaYearValue->getValue()
        ];
    }
}