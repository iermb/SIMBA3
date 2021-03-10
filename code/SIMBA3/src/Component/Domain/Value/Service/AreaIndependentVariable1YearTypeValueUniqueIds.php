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

    public function getAreaUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getAreasId"), $this->typeValueArray->getValues()));
    }

    private function getAreasId(AreaIndependentVariable1YearValue $value): array
    {
        return [TypeArea::TYPE_AREA_ID_FIELD => $value->getTypeAreaId(), Area::AREA_ID_FIELD => $value->getAreaId()];
    }

    public function getIndependentVariable1Ids(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getIndependentVariable1Id"), $this->typeValueArray->getValues()));
    }

    private function getIndependentVariable1Id(AreaIndependentVariable1YearValue $value): array
    {
        return [
            TypeIndependentVariable::TYPE_INDEPENDENT_VARIABLE_ID_FIELD => $value->getTypeIndependentVariableId(),
            IndependentVariable::INDEPENDENT_VARIABLE_ID_FIELD => $value->getIndependentVariableId()
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