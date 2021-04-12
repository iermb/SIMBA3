<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\YearFilter;
use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;

class AreaYearTypeValueUniqueIds
{
    private TypeValueArray $typeValueArray;

    public function __construct(TypeValueArray $typeValueArray)
    {
        $this->typeValueArray = $typeValueArray;
    }

    public function getAreaUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getAreasCode"), $this->typeValueArray->getValues()));
    }

    private function getAreasCode(AreaYearValue $value): array
    {
        return [AreaFilter::TYPE_AREA_CODE_FIELD => $value->getTypeAreaCode(), AreaFilter::AREA_CODE_FIELD => $value->getAreaCode()];
    }

    public function getYearUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getYearId"), $this->typeValueArray->getValues()));
    }

    private function getYearId(AreaYearValue $value): array
    {
        return [YearFilter::YEAR_ID_FIELD => $value->getYear()];
    }
}