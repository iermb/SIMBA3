<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use SIMBA3\Component\Domain\Filter\Service\YearFilter;
use SIMBA3\Component\Domain\Value\Entity\YearValue;
use SIMBA3\Component\Domain\Value\Service\ArrayTool;

class YearUniqueIds
{
    private array $typeValuesArray;

    public function __construct(array $typeValuesArray)
    {
        $this->typeValuesArray = $typeValuesArray;
    }

    public function getUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getYearId"), $this->typeValueArray->getValues()));
    }

    private function getYearId(YearValue $value): array
    {
        return [YearFilter::YEAR_ID_FIELD => $value->getYear()];
    }

}