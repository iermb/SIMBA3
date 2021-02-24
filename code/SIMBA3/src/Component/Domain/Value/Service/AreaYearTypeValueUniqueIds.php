<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class AreaYearTypeValueUniqueIds
{
    private TypeValueArray $typeValueArray;

    public function __construct(TypeValueArray $typeValueArray)
    {
        $this->typeValueArray = $typeValueArray;
    }

    public function getAreaUniqueIds(): array
    {
        return array_unique(array_map(array($this, "getAreasId"), $this->typeValueArray->getValuesAsArray()));
    }

    private function getAreasId(AreaYearValue $value): array
    {
        return [TypeArea::TYPE_AREA_ID_FIELD => $value->getTypeAreaId(), Area::AREA_ID_FIELD => $value->getAreaId()];
    }

    public function getYearUniqueIds(): array
    {
        return array_unique(array_map(array($this, "getYearId"), $this->typeValueArray->getValuesAsArray()));
    }

    private function getYearId(AreaYearValue $value): int
    {
        return $value->getYear();
    }
}