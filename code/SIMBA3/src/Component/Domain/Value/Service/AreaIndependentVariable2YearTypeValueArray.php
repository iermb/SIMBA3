<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;

class AreaIndependentVariable2YearTypeValueArray implements TypeValueArray
{
    private array $listAreaIndependentVariable2YearValue;

    public function __construct(array $listAreaIndependentVariable2YearValue)
    {
        $this->listAreaIndependentVariable2YearValue = $listAreaIndependentVariable2YearValue;
    }

    public function getValues(): array
    {
        return $this->listAreaIndependentVariable2YearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getAreaIndependentVariable2YearTypeValueAsArray"), $this->listAreaIndependentVariable2YearValue);
    }

    private function getAreaIndependentVariable2YearTypeValueAsArray(AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue): array
    {
        return [
            $areaIndependentVariable2YearValue->getIndicatorId(),
            $areaIndependentVariable2YearValue->getTypeAreaId(),
            $areaIndependentVariable2YearValue->getAreaId(),
            $areaIndependentVariable2YearValue->getTypeIndependentVariable1Id(),
            $areaIndependentVariable2YearValue->getIndependentVariable1Id(),
            $areaIndependentVariable2YearValue->getTypeIndependentVariable2Id(),
            $areaIndependentVariable2YearValue->getIndependentVariable2Id(),
            $areaIndependentVariable2YearValue->getYear(),
            $areaIndependentVariable2YearValue->getValue()
        ];
    }
}