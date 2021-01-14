<?php


namespace SIMBA3\Component\Domain\Value\Entity;


class AreaYearTypeValueArray implements TypeValueArray
{
    private array $listAreaYearValue;

    public function __construct(array $listAreaYearValue)
    {
        $this->listAreaYearValue = $listAreaYearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getAreaYearTypeValueAsArray"), $this->listAreaYearValue);
    }

    private function getAreaYearTypeValueAsArray(AreaYearValue $areaYearValue): array
    {
        return [
            $areaYearValue->getIndicatorId(),
            $areaYearValue->getAreaTypeId(),
            $areaYearValue->getAreaId(),
            $areaYearValue->getYear(),
            $areaYearValue->getValue()
        ];
    }
}