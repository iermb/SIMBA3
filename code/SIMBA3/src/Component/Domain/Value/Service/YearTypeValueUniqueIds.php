<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Service\ArrayTool;
use SIMBA3\Component\Domain\Value\Entity\YearValue;
use SIMBA3\Component\Domain\Variable\Entity\Year;

class YearTypeValueUniqueIds
{
    private TypeValueArray $typeValueArray;

    public function __construct(TypeValueArray $typeValueArray)
    {
        $this->typeValueArray = $typeValueArray;
    }

    public function getYearUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getYearId"), $this->typeValueArray->getValues()));
    }

    private function getYearId(YearValue $value): array
    {
        return [Year::YEAR_ID_FIELD => $value->getYear()];
    }
}