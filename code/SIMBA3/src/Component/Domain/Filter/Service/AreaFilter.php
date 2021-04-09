<?php


namespace SIMBA3\Component\Domain\Filter\Service;


use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class AreaFilter implements FilterValues
{
    private int $typeAreaCode;
    private int $areaCode;

    public function __construct(int $typeAreaCode, int $areaCode)
    {
        $this->typeAreaCode = $typeAreaCode;
        $this->areaCode = $areaCode;
    }

    public function getFilterAsArray(): array
    {
        return [
            TypeArea::TYPE_AREA_CODE_FIELD => $this->typeAreaCode,
            Area::AREA_CODE_FIELD => $this->areaCode
        ];
    }
}