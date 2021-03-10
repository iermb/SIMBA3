<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;

class AreaIndependentVariable1YearTypeValueArray implements TypeValueArray
{
    private array $listAreaIndependentVariable1YearValue;

    public function __construct(array $listAreaIndependentVariable1YearValue)
    {
        $this->listAreaIndependentVariable1YearValue = $listAreaIndependentVariable1YearValue;
    }

    public function getValues(): array
    {
        return $this->listAreaIndependentVariable1YearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getAreaIndependentVariable1YearTypeValueAsArray"), $this->listAreaIndependentVariable1YearValue);
    }

    private function getAreaIndependentVariable1YearTypeValueAsArray(AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue): array
    {
        return [
            $areaIndependentVariable1YearValue->getIndicatorId(),
            $areaIndependentVariable1YearValue->getTypeAreaId(),
            $areaIndependentVariable1YearValue->getAreaId(),
            $areaIndependentVariable1YearValue->getTypeIndependentVariableId(),
            $areaIndependentVariable1YearValue->getIndependentVariableId(),
            $areaIndependentVariable1YearValue->getYear(),
            $areaIndependentVariable1YearValue->getValue()
        ];
    }
}