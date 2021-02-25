<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\YearValue;

class YearTypeValueUniqueIds
{
    private TypeValueArray $typeValueArray;

    public function __construct(TypeValueArray $typeValueArray)
    {
        $this->typeValueArray = $typeValueArray;
    }

    public function getYearUniqueIds(): array
    {
        return array_unique(array_map(array($this, "getYearId"), $this->typeValueArray->getValues()));
    }

    private function getYearId(YearValue $value): int
    {
        return $value->getYear();
    }
}