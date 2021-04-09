<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Service\ArrayTool;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\Year;

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
        return [TypeArea::TYPE_AREA_CODE_FIELD => $value->getTypeAreaCode(), Area::AREA_CODE_FIELD => $value->getAreaCode()];
    }

    public function getIndependentVariable1Codes(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getIndependentVariable1Code"), $this->typeValueArray->getValues()));
    }

    private function getIndependentVariable1Code(AreaIndependentVariable1YearValue $value): array
    {
        return [
            TypeIndependentVariable::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $value->getTypeIndependentVariableCode(),
            IndependentVariable::INDEPENDENT_VARIABLE_CODE_FIELD => $value->getIndependentVariableCode()
        ];
    }

    public function getYearUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getYearId"), $this->typeValueArray->getValues()));
    }

    private function getYearId(AreaIndependentVariable1YearValue $value): array
    {
        return [Year::YEAR_ID_FIELD => $value->getYear()];
    }
}