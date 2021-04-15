<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Filter\Service\AreaFilter;

class AreaUniqueIds
{
    private array $areaArray;

    public function __construct(array $areaArray)
    {
        $this->areaArray = $areaArray;
    }

    public function getUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getAreasCode"), $this->areaArray));
    }

    private function getAreasCode(FactArea $value): array
    {
        return [AreaFilter::TYPE_AREA_CODE_FIELD => $value->getTypeId(), AreaFilter::AREA_CODE_FIELD => $value->getId()];
    }
}