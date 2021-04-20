<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class TypeAreaSet
{
    private const TYPE_AREA_CODE_FIELD = "code";
    private const TYPE_AREA_NAME_FIELD = "name";
    private const AREA_CODE_FIELD = "code";
    private const AREA_NAME_FIELD = "name";
    private const AREA_GROUP = "areas";

    private TypeArea $typeArea;
    private array $areaCollection;

    public function __construct(Area $area)
    {
        $this->typeArea = $area->getType();
        $this->areaCollection = [$area];
    }

    public function addArea(Area $area): void
    {
        $this->areaCollection[] = $area;
    }

    public function getArray(): array
    {
        $areaGroup = array_map(array($this, "getAreaAsArray"), $this->areaCollection);

        return [
            self::TYPE_AREA_CODE_FIELD => $this->typeArea->getCode(),
            self::TYPE_AREA_NAME_FIELD => $this->typeArea->getName(),
            self::AREA_GROUP => $areaGroup,
        ];
    }

    private function getAreaAsArray(Area $area):array
    {
        return [
            self::AREA_CODE_FIELD => $area->getCode(),
            self::AREA_NAME_FIELD => $area->getName(),
        ];
    }
}