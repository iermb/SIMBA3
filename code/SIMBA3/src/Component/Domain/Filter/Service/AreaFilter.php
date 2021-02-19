<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class AreaFilter implements FilterValues
{
    private const TYPE_AREA_ID_FIELD = "typeAreaId";
    private const AREA_ID_FIELD      = "areaId";

    private int $typeAreaId;
    private int $areaId;

    public function __construct(int $typeAreaId, int $areaId)
    {
        $this->typeAreaId = $typeAreaId;
        $this->areaId = $areaId;
    }

    public function getFilterAsArray(): array
    {
        return [
            self::TYPE_AREA_ID_FIELD => $this->typeAreaId,
            self::AREA_ID_FIELD => $this->areaId
        ];
    }
}