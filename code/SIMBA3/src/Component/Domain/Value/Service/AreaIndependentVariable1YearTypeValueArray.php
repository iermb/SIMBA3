<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;

class AreaIndependentVariable1YearTypeValueArray extends TypeValueArray
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
        return array_map(array($this, "getAreaIndependentVariable1YearTypeValueAsArray"),
            $this->listAreaIndependentVariable1YearValue);
    }

    public function getAreas(): array
    {
        return $this->uniqueAreasArray(array_map(function (
            AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue
        ) {
            return [
                self::CODE_TYPE_AREA_FIELD => $areaIndependentVariable1YearValue->getTypeAreaCode(),
                self::CODE_AREA_FIELD => $areaIndependentVariable1YearValue->getAreaCode()
            ];
        }, $this->listAreaIndependentVariable1YearValue));
    }

    public function getYears(): array
    {
        return $this->uniqueAreasArray(array_map(function (
            AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue
        ) {
            return [self::CODE_YEAR => $areaIndependentVariable1YearValue->getYear()];
        }, $this->listAreaIndependentVariable1YearValue));
    }

    public function getIndependentVariable(int $number): array
    {
        if ($number == 0) {
            return $this->uniqueAreasArray(array_map(function (
                AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue
            ) {
                return [
                    self::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $areaIndependentVariable1YearValue->getTypeIndependentVariable1Code(),
                    self::INDEPENDENT_VARIABLE_CODE_FIELD => $areaIndependentVariable1YearValue->getIndependentVariable1Code()
                ];
            }, $this->listAreaIndependentVariable1YearValue));
        }
        return parent::getIndependentVariable($number);
    }

    private function getAreaIndependentVariable1YearTypeValueAsArray(
        AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue
    ): array {
        return [
            $areaIndependentVariable1YearValue->getIndicatorId(),
            $areaIndependentVariable1YearValue->getTypeAreaCode(),
            $areaIndependentVariable1YearValue->getAreaCode(),
            $areaIndependentVariable1YearValue->getTypeIndependentVariable1Code(),
            $areaIndependentVariable1YearValue->getIndependentVariable1Code(),
            $areaIndependentVariable1YearValue->getYear(),
            $areaIndependentVariable1YearValue->getValue()
        ];
    }
}