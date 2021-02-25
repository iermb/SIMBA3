<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Variable\Entity\Area;

class AreaDictionary implements TypeDictionary
{
    private const TYPE_AREA_ID_FIELD = "typeAreaId";
    private const AREA_ID_FIELD = "areaId";
    private const TYPE_AREA_NAME_FIELD = "typeAreaName";
    private const AREA_NAME_FIELD = "areaName";

    private array $areas;

    public function __construct(array $areas)
    {
        $this->areas = $areas;
    }


    public function getDictionaryValuesAsArray(): array
    {
        return array_map(array($this, "getAreaAsArray"), $this->areas);
    }

    private function getAreaAsArray(Area $area): array
    {
        return [
            self::TYPE_AREA_ID_FIELD => $area->getType()->getId(),
            self::AREA_ID_FIELD => $area->getId(),
            self::TYPE_AREA_NAME_FIELD => $area->getType()->getName(),
            self::AREA_NAME_FIELD => $area->getName()
        ];
    }
}