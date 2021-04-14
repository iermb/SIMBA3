<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Filter\Service\YearFilter;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;

class AreaIndependentVariable1YearTypeValueUniqueIds
{
    private TypeValueArray $typeValueArray;

    public function __construct(TypeValueArray $typeValueArray)
    {
        $this->typeValueArray = $typeValueArray;
    }

    public function getAreaUniqueCodes(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getAreasCode"), $this->typeValueArray->getValues()));
    }

    private function getAreasCode(AreaIndependentVariable1YearValue $value): array
    {
        return [AreaFilter::TYPE_AREA_CODE_FIELD => $value->getTypeAreaCode(), AreaFilter::AREA_CODE_FIELD => $value->getAreaCode()];
    }

    public function getIndependentVariable1Codes(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getIndependentVariable1Code"), $this->typeValueArray->getValues()));
    }

    private function getIndependentVariable1Code(AreaIndependentVariable1YearValue $value): array
    {
        return [
            IndependentVariableFilter::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $value->getTypeIndependentVariable1Code(),
            IndependentVariableFilter::INDEPENDENT_VARIABLE_CODE_FIELD => $value->getIndependentVariable1Code()
        ];
    }

    public function getYearUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getYearId"), $this->typeValueArray->getValues()));
    }

    private function getYearId(AreaIndependentVariable1YearValue $value): array
    {
        return [YearFilter::YEAR_ID_FIELD => $value->getYear()];
    }
}