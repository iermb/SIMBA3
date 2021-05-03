<?php


namespace SIMBA3\Component\Application\VariableIndicator\Response;


use SIMBA3\Component\Domain\Variable\Entity\Area;

class ReadAreasIndicatorResponse
{
    private const TYPE_AREA_ID_FIELD   = "TypeAreaId";
    private const TYPE_AREA_NAME_FIELD = "TypeAreaName";
    private const AREA_ID_FIELD        = "AreaId";
    private const AREA_NAME_FIELD      = "AreaName";

    private array $areas;

    public function __construct(array $areas)
    {
        $this->areas = $areas;
    }

    public function getAreasIndicatorAsArray(): array
    {
        return array_map(array($this, 'getAreaAsArray'), $this->areas);
    }

    private function getAreaAsArray(Area $area): array
    {
        return [
            self::TYPE_AREA_ID_FIELD => $area->getType()->getId(),
            self::TYPE_AREA_NAME_FIELD => $area->getType()->getName(),
            self::AREA_ID_FIELD => $area->getCode(),
            self::AREA_NAME_FIELD => $area->getName()
        ];
    }

}