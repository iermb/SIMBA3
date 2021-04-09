<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Service\ArrayTool;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\Year;

class AreaIndependentVariable2YearTypeValueUniqueIds
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

    private function getAreasCode(AreaIndependentVariable2YearValue $value): array
    {
        return [TypeArea::TYPE_AREA_CODE_FIELD => $value->getTypeAreaCode(), Area::AREA_CODE_FIELD => $value->getAreaCode()];
    }

    public function getIndependentVariable1Codes(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getIndependentVariable1Code"), $this->typeValueArray->getValues()));
    }

    public function getIndependentVariable2Codes(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getIndependentVariable2Code"), $this->typeValueArray->getValues()));
    }

    private function getIndependentVariable1Code(AreaIndependentVariable2YearValue $value): array
    {
        return [
            TypeIndependentVariable::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $value->getTypeIndependentVariable1Code(),
            IndependentVariable::INDEPENDENT_VARIABLE_CODE_FIELD => $value->getIndependentVariable1Code()
        ];
    }

    private function getIndependentVariable2Code(AreaIndependentVariable2YearValue $value): array
    {
        return [
            TypeIndependentVariable::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $value->getTypeIndependentVariable2Code(),
            IndependentVariable::INDEPENDENT_VARIABLE_CODE_FIELD => $value->getIndependentVariable2Code()
        ];
    }

    public function getYearUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getYearId"), $this->typeValueArray->getValues()));
    }

    private function getYearId(AreaIndependentVariable2YearValue $value): array
    {
        return [Year::YEAR_ID_FIELD => $value->getYear()];
    }
}