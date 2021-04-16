<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\YearValue;

class YearTypeValueArray extends TypeValueArray
{
    private array $listYearValue;

    public function __construct(array $listYearValue)
    {
        $this->listYearValue = $listYearValue;
    }

    public function getValues(): array
    {
        return $this->listYearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getYearTypeValueAsArray"), $this->listYearValue);
    }

    public function getYears(): array
    {
        return $this->uniqueArray(array_map(function (
            YearValue $yearValue
        ) {
            return [self::CODE_YEAR => $yearValue->getYear()];
        }, $this->listYearValue));
    }

    private function getYearTypeValueAsArray(YearValue $yearValue): array
    {
        return [
            $yearValue->getIndicatorId(),
            $yearValue->getYear(),
            $yearValue->getValue()
        ];
    }
}