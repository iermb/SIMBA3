<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;

class AreaIndependentVariable2YearTypeValueArray extends TypeValueArray
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
        return array_map(array($this, "getAreaIndependentVariable2YearTypeValueAsArray"),
            $this->listAreaIndependentVariable2YearValue);
    }

    public function getAreas(): array
    {
        return $this->uniqueArray(array_map(function (
            AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue
        ) {
            return [
                self::CODE_TYPE_AREA_FIELD => $areaIndependentVariable2YearValue->getTypeAreaCode(),
                self::CODE_AREA_FIELD => $areaIndependentVariable2YearValue->getAreaCode()
            ];
        }, $this->listAreaIndependentVariable2YearValue));
    }

    public function getIndependentVariable(int $number): array
    {
        if ($number == 1) {
            return $this->uniqueArray(array_map(function (
                AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue
            ) {
                return [
                    self::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $areaIndependentVariable2YearValue->getTypeIndependentVariable1Code(),
                    self::INDEPENDENT_VARIABLE_CODE_FIELD => $areaIndependentVariable2YearValue->getIndependentVariable1Code()
                ];
            }, $this->listAreaIndependentVariable2YearValue));
        }
        if ($number == 2) {
            return $this->uniqueArray(array_map(function (
                AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue
            ) {
                return [
                    self::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $areaIndependentVariable2YearValue->getTypeIndependentVariable2Code(),
                    self::INDEPENDENT_VARIABLE_CODE_FIELD => $areaIndependentVariable2YearValue->getIndependentVariable2Code()
                ];
            }, $this->listAreaIndependentVariable2YearValue));
        }

        return parent::getIndependentVariable($number);
    }

    public function getYears(): array
    {
        return $this->uniqueArray(array_map(function (
            AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue
        ) {
            return [self::CODE_YEAR => $areaIndependentVariable2YearValue->getYear()];
        }, $this->listAreaIndependentVariable2YearValue));
    }

    private function getAreaIndependentVariable2YearTypeValueAsArray(
        AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue
    ): array {
        return [
            $areaIndependentVariable2YearValue->getIndicatorId(),
            $areaIndependentVariable2YearValue->getTypeAreaCode(),
            $areaIndependentVariable2YearValue->getAreaCode(),
            $areaIndependentVariable2YearValue->getTypeIndependentVariable1Code(),
            $areaIndependentVariable2YearValue->getIndependentVariable1Code(),
            $areaIndependentVariable2YearValue->getTypeIndependentVariable2Code(),
            $areaIndependentVariable2YearValue->getIndependentVariable2Code(),
            $areaIndependentVariable2YearValue->getYear(),
            $areaIndependentVariable2YearValue->getValue()
        ];
    }
}